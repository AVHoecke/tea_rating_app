CREATE SCHEMA `blogdatabase` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE blogdatabase.posts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    body TEXT,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

/* Then insert some posts for testing: */
INSERT INTO posts (title, body, created)
    VALUES ('The title', 'This is the post body.', NOW());
INSERT INTO posts (title, body, created)
    VALUES ('A title once again', 'And the post body follows.', NOW());
INSERT INTO posts (title, body, created)
    VALUES ('Title strikes back', 'This is really exciting! Not.', NOW());

create user if not exists 'cakeBlog'@'localhost' IDENTIFIED BY 'c4k3-rUl3Z';
GRANT ALL PRIVILEGES ON blogdatabase.posts TO 'cakeBlog'@'localhost';