<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SensorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
$content = $request->input('nama'); // Ganti 'komentar' dengan nama input yang sesuai

    // Daftar kata-kata kotor
    $kataKotor = ['bodoh', 'goblok', 'stupid'];

    // Sensor kata-kata kotor
    foreach ($kataKotor as $kata) {
        $content = str_ireplace($kata, '***', $content);
    }

    // Set konten yang sudah disensor kembali ke permintaan
    $request->merge(['nama' => $content]);

    return $next($request);
    }
}
