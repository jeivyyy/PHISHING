<?php

namespace App\Services;

use App\Models\Victim;
use Illuminate\Support\Str;

class AdminAccessService
{
    private const ADMIN_DOMAIN = 'admin.com';

    private const SIMILARITY_LIMIT = 85.0;

    public function emailIsAllowed(string $email): bool
    {
        $email = Str::lower(trim($email));

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        [$local, $domain] = explode('@', $email, 2);

        // Só aceita domínio exatamente @admin.com
        if ($domain !== self::ADMIN_DOMAIN) {
            return false;
        }

        $adminLocal = $this->normalizeLocalPart($local);

        if ($adminLocal === '') {
            return false;
        }

        foreach (
            Victim::query()
                ->select('email')
                ->whereNotNull('email')
                ->cursor() as $victim
        ) {
            $victimEmail = Str::lower(trim($victim->email));

            if (! str_contains($victimEmail, '@')) {
                continue;
            }

            [$victimLocal] = explode('@', $victimEmail, 2);

            $victimLocal = $this->normalizeLocalPart($victimLocal);

            if ($victimLocal === '') {
                continue;
            }

            // Se for exatamente igual, bloqueia
            if ($adminLocal === $victimLocal) {
                return false;
            }

            // Se for muito parecido, bloqueia
            similar_text(
                $adminLocal,
                $victimLocal,
                $similarity
            );

            if ($similarity >= self::SIMILARITY_LIMIT) {
                return false;
            }
        }

        return true;
    }

    private function normalizeLocalPart(string $value): string
    {
        $value = Str::ascii(Str::lower($value));

        return preg_replace(' /[^a-z0-9]/', '', $value) ?? '';
    }
}