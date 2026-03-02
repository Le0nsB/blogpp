<?php

require "models/Model.php";
class Blog extends Model {
    private array $attributes = [];
    private static ?string $contentColumn = null;

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function __get($name)
    {
        return $this->attributes[$name] ?? null;
    }

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    protected static function getTableName(): string
    {
        return "posts";
    }

    public static function find($id): ?self
    {
        self::init();

        $sql = "SELECT * FROM " . static::getTableName() . " WHERE id = :id LIMIT 1";
        $record = self::$db->query($sql, ['id' => $id])->fetch();

        return $record ? new self($record) : null;
    }

    public static function create(array $data): bool
    {
        self::init();

        $content = trim($data['body'] ?? $data['content'] ?? $data['text'] ?? '');
        $column = static::getContentColumn();

        $sql = "INSERT INTO " . static::getTableName() . " (" . $column . ") VALUES (:content)";
        return self::$db->query($sql, ['content' => $content]) !== false;
    }

    public function save(): bool
    {
        self::init();

        if (empty($this->attributes['id'])) {
            return false;
        }

        $content = trim($this->attributes['body'] ?? $this->attributes['content'] ?? $this->attributes['text'] ?? '');
        $column = static::getContentColumn();

        $sql = "UPDATE " . static::getTableName() . " SET " . $column . " = :content WHERE id = :id";

        return self::$db->query($sql, [
            'content' => $content,
            'id' => $this->attributes['id'],
        ]) !== false;
    }

    public function delete(): bool
    {
        self::init();

        if (empty($this->attributes['id'])) {
            return false;
        }

        $sql = "DELETE FROM " . static::getTableName() . " WHERE id = :id";
        return self::$db->query($sql, ['id' => $this->attributes['id']]) !== false;
    }

    private static function getContentColumn(): string
    {
        if (self::$contentColumn !== null) {
            return self::$contentColumn;
        }

        $sql = "SHOW COLUMNS FROM " . static::getTableName();
        $columns = self::$db->query($sql)->fetchAll();
        $columnNames = array_map(fn($column) => $column['Field'], $columns);

        foreach (['body', 'content', 'text'] as $preferred) {
            if (in_array($preferred, $columnNames, true)) {
                self::$contentColumn = $preferred;
                return self::$contentColumn;
            }
        }

        self::$contentColumn = $columnNames[0] ?? 'body';
        return self::$contentColumn;
    }
}