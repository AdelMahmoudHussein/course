<!--
Make the pagination  With bootstrap, we make it easy to make pagination buttons with a design
         good course -->
<ul class="pagination">
    
    
    
<!-- LINK FIRST AND PREV -->
    <?php
    if ($page == 1) {// If the page is used to 1, then disable the PREV link
    ?>
        <li class="disabled"><a href="#">First</a></li>
        <li class="disabled"><a href="#">&laquo;</a></li>
    <?php
    } else { // If you open page 1
        $link_prev = ($page > 1) ? $page - 1 : 1;
    ?>
        <li><a href="index.php?page=1<?php echo $search_string; ?>">First</a></li>
        <li><a href="index.php?page=<?php echo $link_prev,$search_string; ?>">&laquo;</a></li>
    <?php
    }
    ?>

    
        
        
<!-- LINK NUMBER -->
    <?php
    $total_number = 3; // Specify the link number before and after the current page
    $start_number = ($page > $total_number) ? $page - $total_number : 1; // For the beginning of the member link
    $end_number = ($page < ($total_page - $total_number)) ? $page + $total_number : $total_page; // To the end of the link number

    for ($i = $start_number; $i <= $end_number; $i++) {
        $link_active = ($page == $i) ? 'class="active"' : '';
    ?>
        <li <?php echo $link_active; ?>><a href="index.php?page=<?php echo $i,$search_string; ?>"><?php echo $i; ?></a></li>
    <?php } ?>

        
        
        
        
        
<!-- LINK NEXT AND LAST -->
    <?php
    // If the page is equal to the number of pages, then disable the NEXT link
     // This means that the page is the last page
     if ($page == $total_page) {// if the last page
    ?>
        <li class="disabled"><a href="#">&raquo;</a></li>
        <li class="disabled"><a href="#">Last</a></li>
    <?php
    } else { // If not the last page
        $link_next = ($page < $total_page) ? $page + 1 : $total_page;
    ?>
        <li><a href="index.php?page=<?php echo $link_next,$search_string; ?>">&raquo;</a></li>
        <li><a href="index.php?page=<?php echo $total_page,$search_string; ?>">Last</a></li>
    <?php
    }
    ?>
</ul>