<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;

class GalleryController extends Controller
{
   // Rendu de la page initiale Inertia
    public function index(Request $request)
    {
        $data = $this->getGalleryData($request, 1);
        return Inertia::render('Galerie', $data);
    }

    // API pure pour Axios (Infinite Scroll & Filtres)
    public function fetchPhotos(Request $request)
    {
        $page = (int) $request->input('page', 1);
        $data = $this->getGalleryData($request, $page);
        return response()->json($data);
    }

    // Logique commune de traitement des images
    private function getGalleryData(Request $request, int $page)
    {
        $galleryPath = public_path('gallery');
        $photos = [];
        $categories = [];

        if (File::exists($galleryPath)) {
            $directories = File::directories($galleryPath);

            foreach ($directories as $dir) {
                $categorySlug = basename($dir);
                $categories[] = $categorySlug;

                $files = File::files($dir);
                foreach ($files as $file) {
                    $photos[] = [
                        'id' => $categorySlug . '/' . $file->getFilename(),
                        'src' => asset('gallery/' . $categorySlug . '/' . $file->getFilename()),
                        'category' => $categorySlug,
                        'categoryLabel' => ucwords(str_replace(['-', '_'], ' ', $categorySlug)),
                    ];
                }
            }
        }

        $selectedCategory = $request->input('category', 'all');
        if ($selectedCategory !== 'all') {
            $photos = array_values(array_filter($photos, fn($p) => $p['category'] === $selectedCategory));
        }

        $seed = $request->input('seed', session()->get('gallery_seed', rand(1, 99999)));
        session()->put('gallery_seed', $seed);

        usort($photos, function ($a, $b) use ($seed) {
            return crc32($a['id'] . $seed) <=> crc32($b['id'] . $seed);
        });

        $perPage = 12;
        $offset = ($page - 1) * $perPage;

        $paginatedPhotos = array_slice($photos, $offset, $perPage);
        $total = count($photos);

        return [
            'photos' => $paginatedPhotos,
            'categories' => array_values(array_unique($categories)),
            'hasMore' => ($offset + $perPage) < $total,
            'currentPage' => $page,
            'total' => $total,
            'currentCategory' => $selectedCategory,
            'seed' => (int) $seed,
        ];
    }
}
