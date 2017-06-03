<?php
namespace Emsa\Content;

class Content
{
    function getAll($app)
    {
        $sql = "SELECT * FROM VContent;";
        return $app->db->executeFetchAll($sql);
    }

    function getPages($app)
    {
        $sql = "SELECT * FROM VPages";
        return $app->db->executeFetchAll($sql);
    }

    function getBlogposts($app)
    {
        $sql = "SELECT * FROM VPosts";
        return $app->db->executeFetchAll($sql);
    }

    function getContent($app, $id)
    {
        $sql = "SELECT * FROM content WHERE id = ?;";
        return $app->db->executeFetch($sql, [$id]);
    }

    function getTitle($app, $id)
    {
        $sql = "SELECT id, title FROM content WHERE id = ?;";
        return $app->db->executeFetch($sql, [$id]);
    }

    function getPost($app, $slug)
    {
        $sql = "SELECT * FROM VPosts WHERE slug = ?";
        return $app->db->executeFetch($sql, [$slug]);
    }

    function getPage($app, $path)
    {
        $sql = "SELECT * FROM VPages WHERE path = ?";
        return $app->db->executeFetch($sql, [$path]);
    }

    function create($app, $title)
    {
        $sql = "INSERT INTO content (title) VALUES (?);";
        $app->db->execute($sql, [$title]);
    }

    function update($app, $params)
    {
        $sql = "UPDATE content SET title=?, path=?, slug=?, data=?, type=?, filter=?, published=?, updated=NOW() WHERE id = ?;";
        $app->db->execute($sql, array_values($params));
    }

    function delete($app, $id)
    {
        $sql = "UPDATE content SET deleted=NOW() WHERE id=?;";
        $app->db->execute($sql, [$id]);
    }

    /**
     * Create a slug of a string, to be used as url.
     *
     * @param string $str the string to format as slug.
     *
     * @return str the formatted slug.
     */
    function slugify($str)
    {
        $str = mb_strtolower(trim($str));
        $str = str_replace(array('å','ä','ö'), array('a','a','o'), $str);
        $str = preg_replace('/[^a-z0-9-]/', '-', $str);
        $str = trim(preg_replace('/-+/', '-', $str), '-');
        return $str;
    }
}
