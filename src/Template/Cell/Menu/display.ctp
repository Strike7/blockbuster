<ul>
    <?php foreach($menu as $item) {
        echo '<li>' . $this -> Html -> link ($item['title'], $item['url']);
    } ?>
</ul>