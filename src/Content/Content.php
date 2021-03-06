<?php
namespace Emsa\Content;

class Content
{
    public function getAll($app)
    {
        $sql = "SELECT * FROM VContent;";
        return $app->db->executeFetchAll($sql);
    }

    public function getPages($app)
    {
        $sql = "SELECT * FROM VPages";
        return $app->db->executeFetchAll($sql);
    }

    public function getBlogposts($app)
    {
        $sql = "SELECT * FROM VPosts";
        return $app->db->executeFetchAll($sql);
    }

    public function getSlugs($app, $id)
    {
        $sql = "SELECT slug FROM VContent WHERE id != ?;";
        $slugs = $app->db->executeFetchAll($sql, [$id]);
        $resultset = [];
        foreach ($slugs as $slug) {
            $resultset[] = $slug->slug;
        }
        return $resultset;
    }

    public function getContent($app, $id)
    {
        $sql = "SELECT * FROM content WHERE id = ?;";
        return $app->db->executeFetch($sql, [$id]);
    }

    public function getTitle($app, $id)
    {
        $sql = "SELECT id, title FROM content WHERE id = ?;";
        return $app->db->executeFetch($sql, [$id]);
    }

    public function getPost($app, $slug)
    {
        $sql = "SELECT * FROM VPosts WHERE slug = ?";
        return $app->db->executeFetch($sql, [$slug]);
    }

    public function getPage($app, $path)
    {
        $sql = "SELECT * FROM VPages WHERE path = ?";
        return $app->db->executeFetch($sql, [$path]);
    }

    // Om path saknas så använder länken slugen istället,
    // och därför måste även select-satsen leta efter matchande slug.
    public function getPageFromSlug($app, $slug)
    {
        $sql = "SELECT * FROM VPages WHERE slug = ?";
        return $app->db->executeFetch($sql, [$slug]);
    }

    public function getBlock($app, $blockSlug)
    {
        $sql = "SELECT * FROM VBlock WHERE slug = ?";
        return $app->db->executeFetch($sql, [$blockSlug]);
    }

    public function create($app, $title)
    {
        $sql = "INSERT INTO content (title) VALUES (?);";
        $app->db->execute($sql, [$title]);
    }

    public function update($app, $params)
    {
        $sql = "UPDATE content SET title=?, path=?, slug=?, data=?, type=?, filter=?, published=?, updated=NOW() WHERE id = ?;";
        $app->db->execute($sql, array_values($params));
    }

    public function delete($app, $id)
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
    public function slugify($str)
    {
        $str = mb_strtolower(trim($str));
        $str = str_replace(array('å','ä','ö'), array('a','a','o'), $str);
        $str = preg_replace('/[^a-z0-9-]/', '-', $str);
        $str = trim(preg_replace('/-+/', '-', $str), '-');
        return $str;
    }

    //Goes through list of existing slugs and checks if current slug already
    //exists. In that case an incrementing number is appended to the slug,
    //and the recursive function checks the value of the new slug.
    public function checkDuplicateSlugs($currentSlug, $slugs, $copy = null, $order = 1)
    {
        foreach ($slugs as $slug) {
            if ($currentSlug.$copy == $slug) {
                $order++;
                $copy = "-$order";
                $copy = $this->checkDuplicateSlugs($currentSlug, $slugs, $copy, $order);
            }
        }
        return $copy;
    }
}
