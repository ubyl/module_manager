<?php
namespace App\Doctrine\DBAL\Type;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

abstract class EnumType extends Type
{
    protected $name;
    protected $values = array();
    
    /**
     * Gets the SQL declaration snippet for a column of this type.
     *
     * @param mixed[]          $column   The column definition
     * @param AbstractPlatform $platform The currently used database platform.
     *
     * @return string
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string
    {
        $values = array_map(function($val) { return "'".$val."'"; }, $this->values);
        
        return "ENUM(".implode(", ", $values).")";
    }
    
    /**
     * Converts a value from its database representation to its PHP representation
     * of this type.
     *
     * @param mixed            $value    The value to convert.
     * @param AbstractPlatform $platform The currently used database platform.
     *
     * @return mixed The PHP representation of the value.
     *
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return $value;
    }
    
    /**
     * Modifies the SQL expression (identifier, parameter) to convert to a database value.
     *
     * @param string $sqlExpr
     *
     * @return string
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        if (!in_array($value, $this->values) && !$value === null) {
            throw new \InvalidArgumentException("Invalid '".$this->name."' value.");
        }
        return $value;
    }
    
    /**
     * Gets the name of this type.
     *
     * @return string
     *
     * @todo Needed?
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * If this Doctrine Type maps to an already mapped database type,
     * reverse schema engineering can't tell them apart. You need to mark
     * one of those types as commented, which will have Doctrine use an SQL
     * comment to typehint the actual Doctrine Type.
     *
     * @return bool
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }
    
    public function getValues()
    {
        return $this->values;
    }
    
    public function getKey($value): ?string
    {
        return array_search($value, $this->values);
    }
    
    public function getOptions()
    {
        return array_keys($this->values);
    }
    
    public function getDbValues()
    {
        return array_values($this->values);
    }
}
