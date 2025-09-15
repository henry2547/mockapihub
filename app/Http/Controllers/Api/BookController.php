<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            // Get query parameters
            $perPage = $request->get('per_page', 15);
            $page = $request->get('page', 1);
            $genre = $request->get('genre');
            $author = $request->get('author');
            $search = $request->get('search');
            $sortBy = $request->get('sort_by', 'title');
            $sortOrder = $request->get('sort_order', 'asc');

            // Validate sort parameters
            $validSortFields = ['title', 'author', 'published_date', 'page_count', 'created_at'];
            if (!in_array($sortBy, $validSortFields)) {
                $sortBy = 'title';
            }

            // Build query
            $query = Book::query();

            if ($genre) {
                $query->where('genre', $genre);
            }

            if ($author) {
                $query->where('author', 'like', '%' . $author . '%');
            }

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
                });
            }

            $query->orderBy($sortBy, $sortOrder);

            // Paginate results
            $books = $query->paginate($perPage, ['*'], 'page', $page);

            return response()->json([
                'success' => true,
                'data' => $books->items(),
                'pagination' => [
                    'current_page' => $books->currentPage(),
                    'per_page' => $books->perPage(),
                    'total' => $books->total(),
                    'last_page' => $books->lastPage(),
                ],
                'filters' => [
                    'genre' => $genre,
                    'author' => $author,
                    'search' => $search,
                    'sort_by' => $sortBy,
                    'sort_order' => $sortOrder
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve books',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'isbn' => 'required|string|unique:books,isbn',
                'published_date' => 'required|date',
                'description' => 'required|string',
                'genre' => 'required|string|max:100',
                'publisher' => 'required|string|max:255',
                'language' => 'sometimes|string|max:50',
                'page_count' => 'required|integer|min:1',
                'cover_image' => 'sometimes|url|max:500'
            ]);

            $book = Book::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Book created successfully',
                'data' => $book
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create book',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            $book = Book::find($id);

            if (!$book) {
                return response()->json([
                    'success' => false,
                    'message' => 'Book not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $book
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve book',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        try {
            $book = Book::find($id);

            if (!$book) {
                return response()->json([
                    'success' => false,
                    'message' => 'Book not found'
                ], 404);
            }

            $validated = $request->validate([
                'title' => 'sometimes|string|max:255',
                'author' => 'sometimes|string|max:255',
                'isbn' => 'sometimes|string|unique:books,isbn,' . $id,
                'published_date' => 'sometimes|date',
                'description' => 'sometimes|string',
                'genre' => 'sometimes|string|max:100',
                'publisher' => 'sometimes|string|max:255',
                'language' => 'sometimes|string|max:50',
                'page_count' => 'sometimes|integer|min:1',
                'cover_image' => 'sometimes|url|max:500'
            ]);

            $book->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Book updated successfully',
                'data' => $book
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update book',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $book = Book::find($id);

            if (!$book) {
                return response()->json([
                    'success' => false,
                    'message' => 'Book not found'
                ], 404);
            }

            $book->delete();

            return response()->json([
                'success' => true,
                'message' => 'Book deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete book',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get available genres
     */
    public function genres(): JsonResponse
    {
        try {
            $genres = Book::distinct()->pluck('genre')->sort()->values();

            return response()->json([
                'success' => true,
                'data' => $genres
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve genres',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get books by author
     */
    public function byAuthor(string $author): JsonResponse
    {
        try {
            $books = Book::where('author', 'like', '%' . $author . '%')
                        ->orderBy('title')
                        ->get();

            return response()->json([
                'success' => true,
                'data' => $books,
                'count' => $books->count(),
                'author' => $author
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve books by author',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
