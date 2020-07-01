        <div class="footer_panel">
            <p><a href="https://www.linkedin.com/in/nikola-nedeljkovic-8110b5150">&copy; Nikola Nedeljkovic 2020 &nbsp;&nbsp;&nbsp; @ ICT</a></p>
            <div class="site_links">
                <h3>Site links:</h3>
                <ul>
                    <?php
                        if(isset($_SESSION['user'])) {
                            echo "<li><a href=\"index.php?page=main\">Shopping list</a></li>";
                            if (($_SESSION['user']->role_id == 1) || ($_SESSION['user']->role_id == 3)) {
                                echo "<li><a href=\"index.php?page=admin\">Admin</a></li>";
                            }
                            if ($_SESSION['user']->role_id == 3) {
                                echo "<li><a href=\"index.php?page=teacher\">Author</a></li>";
                                echo "<li><a href=\"sitemap.xml\">Sitemap</a></li>";
                            }
                        } else {
                            echo "<li><a href=\"index.php?page=login\">Login</a></li>";
                            echo "<li><a href=\"index.php?page=register\">Register</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </body>
        <script type="text/javascript" src="assets/js/main.js"></script>
</html>
