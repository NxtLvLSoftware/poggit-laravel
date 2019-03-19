<?php

namespace App\Models\Traits;

use App\Models\KnownIpAddress;

trait HasKnownIps
{
    public function lastKnownIp(): ?KnownIpAddress
    {
        return $this->known_ips()->latest('updated_at')->first();
    }

    public function hasKnownIp(string $ip): bool
    {
        return $this->known_ips()->where('ip', $ip)->first() !== null;
    }

    public function addKnownIp(string $ip): KnownIpAddress
    {
        return KnownIpAddress::create([
            'user_id' => $this->id,
            'ip' => $ip,
        ]);
    }

    public function known_ips()
    {
        return $this->hasMany(KnownIpAddress::class);
    }
}
