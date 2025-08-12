<?php

declare(strict_types=1);

namespace Hiap\Selfwork\Config;

use SensitiveParameter;

readonly final class Config
{
    public function __construct(
        private string                       $login,
        #[SensitiveParameter] private string $password
    ) {
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEncryptedPassword(): string
    {
        return md5($this->password);
    }

    public function getLogin(): string
    {
        return $this->login;
    }
}
