# MySQL Table Setup

## Database
```sql
USE study;
```

## Create Posts Table
```sql
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    author VARCHAR(100) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

## Verify Table
```sql
SHOW TABLES;
DESC posts;
```

## Test Data
```sql
INSERT INTO posts (title, content, author)
VALUES ('first', 'test', 'admin');
```

## Verify Data
```sql
SELECT * FROM posts;
```