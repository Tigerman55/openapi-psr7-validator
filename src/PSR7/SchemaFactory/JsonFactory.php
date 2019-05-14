<?php

declare(strict_types=1);

namespace OpenAPIValidation\PSR7\SchemaFactory;

use cebe\openapi\Reader;
use cebe\openapi\ReferenceContext;
use cebe\openapi\spec\OpenApi;

final class JsonFactory extends StringFactory
{
    public function createSchema() : OpenApi
    {
        $schema = Reader::readFromJson($this->getContent());

        $schema->resolveReferences(new ReferenceContext($schema, '/'));

        return $schema;
    }
}
