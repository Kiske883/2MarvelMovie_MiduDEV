<?php

declare(strict_types=1);

class NextMovie
{
    public function __construct(
        public string $title,
        public int $daysUntil,
        // public string $following_production,
        public array $following_production = [
            'posterUrl' => '',
            'title' => '',
            'releaseDate' => ''
        ],      
        public string $releaseDate,
        public string $posterUrl,
        public string $overview
    ) {}

    public function get_data()
    {
        return get_object_vars($this);
    }

    public function get_until_message(): string
    {
        $days = $this->daysUntil;  // Convertimos a int para evitar problemas de comparacion
        return match (true) {
            $days < 0 => "La película ya se ha estrenado!",
            $days == 0 => "Hoy es el estreno!",
            $days == 1 => "La película se estrena mañana!",
            $days <= 7 => "La película se estrena esta semana",
            $days <= 30 => "La película se estrena este mes",
            default => "La película se estrena en $days días.",
        };
    }

    public static function fetch_and_create_movie(string $api_url): NextMovie
    {
        $result = file_get_contents($api_url);
        $data = json_decode($result, true);

        $following = [
            'posterUrl' => $data["following_production"]["poster_url"] ?? '',
            'title' => $data["following_production"]["title"] ?? '',
            'releaseDate' => $data["following_production"]["release_date"] ?? ''
        ];

        return new self(
            $data["title"],
            $data["days_until"],
            $following,
            $data["release_date"],
            $data["poster_url"],
            $data["overview"]
        );
    }
}
