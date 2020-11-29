<?php

declare(strict_types=1);

namespace Monobank\Response;

use Monobank\Response\Model\Statement;

final class StatementResponse
{
    private array $statements;

    public function __construct(array $statements)
    {
        $this->statements = $statements;
    }

    public static function fromResponse(array $data): self
    {
        return new self(array_map(function (array $statement) {
            return Statement::fromResponse($statement);
        }, $data));
    }

    /**
     * @return array|Statement[]
     */
    public function statements(): array
    {
        return $this->statements;
    }
}
