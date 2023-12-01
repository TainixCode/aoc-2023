<?php
declare(strict_types=1);

namespace Solutions\Day1;

class Calibration
{
    private ?string $first = null;
    private ?string $last = null;

    public function __construct(
        private string $input
    ) {}

    private function setFirst(?string $value): void
    {
        // Si on a déjà mis une valeur, on ne la change plus
        if (! is_null($this->first)) {
            return;
        }

        $this->first = $value;
    }

    private function setLast(?string $value): void
    {
        $this->last = $value;
    }

    public function analyze(): void
    {
        $length = strlen($this->input);

        for ($i = 0; $i < $length; $i++) {

            // Si je trouve un chiffre, je l'utilise directement
            if (is_numeric($this->input[$i])) {
                $this->setFirst($this->input[$i]);
                $this->setLast($this->input[$i]);
                continue;
            }

            // Sinon je cherche un chiffre écrit en lettre
            $digit = Filter::findDigit(substr($this->input, $i));

            if (is_null($digit)) {
                continue;
            }
            
            $this->setFirst($digit);
            $this->setLast($digit);
        }
    }

    public function getNumber(): int
    {
        return (int) (0 . $this->first . $this->last);
    }
}