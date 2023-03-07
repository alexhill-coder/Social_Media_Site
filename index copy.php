<?php include("assets/includes/header.php");
include("assets/includes/classes/User.php");
include("assets/includes/classes/Post.php"); 

if(isset($_POST['post'])) {
    $post = new Post($con, $userLoggedIn);
    $post->submitPost($_POST['post_text'], 'none');
    header("Location: index.php");
}

?>

        <!-- <div class="user_details column">
            <a href="#"><img src="<?php echo $user['profile_pic']; ?>"></a>
        </div> -->
      
            <div class="row"> 
                <div class="card mb-3 col me-4 profile">

                    <div class="row">
                        <div class="row g-0">
                            <div class="col-7">
                                <a href="<?php echo $userLoggedIn ?>"><img src="<?php echo $user['profile_pic']; ?>" class="img-fluid" alt="..."></a>
                            </div>
                            <div class="col-5">
                            <div class="card-body text">
                                <p class="card-text"><a href="<?php echo $userLoggedIn ?>"><?php echo $user['first_name'] . " " . $user['last_name']; ?></a></p>
                                <p class="card-text"><?php echo "Posts: " . " " . $user['num_posts'] . "<br>" . "Likes: " . $user['num_likes']; ?></p>
                            </div>
                        </div>
                    </div>


                    <div class="card card-body mt-3 popular">
                        <form class="post_form" action="index.php" method="POST">
                            <textarea name="post_text" id="post_text" placeholder="Got something to day?"></textarea>
                            <input type="submit" name="post" id="post_button" value="Post">
                            <hr>
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider .</p>
                        </form>
                    </div>


                    </div>
                </div>



                <div id="popular" class="card card-body mb-3 col-auto popular2">
                    <form class="post_form" action="index.php" method="POST">
                        <textarea name="post_text" id="post_text" placeholder="Got something to day?"></textarea>
                        <input type="submit" name="post" id="post_button" value="Post">
                        <hr>
                    </form>
                </div>




                <div class="card mb-3 col newsfeed">
                    <div class="card-body">
                        <form class="post_form" action="index.php" method="POST">
                            <textarea name="post_text" id="post_text" placeholder="Got something to day?"></textarea>
                            <input type="submit" name="post" id="post_button" value="Post">
                            <hr>
                        </form>

                        <div class="posts_area"></div>
                        <img id="loading" src="assets/images/icons/loading.gif">
                    </div>
                </div>



            </div>

        </div>
        <script>
            let userLoggedIn = '<?php echo $userLoggedIn; ?>';
            $(document).ready(function() {
                $('#loading').show();

                //Original ajax request for loading first posts.
                $.ajax({
                    url: "assets/includes/handlers/ajax_load_posts.php",
                    type: "POST",
                    data: "page=1&userLoggedIn=" + userLoggedIn,
                    cache: false,

                    success: function(data) {
                        $('#loading').hide();
                        $('.posts_area').html(data);
                    }
                });

                $(window).scroll(function() {
                    let height = $('.posts_area').height(); //Div containing posts
                    let scroll_top = $(this).scrollTop();
                    let page = $('.posts_area').find('.nextPage').val();
                    let noMorePosts = $('.posts_area').find('.noMorePosts').val();

                    if ((document.body.scrollHeight == document.body.scrollTop + window.innerHeight) && noMorePosts == 'false') {
                        $('#loading').show();
                        alert("hello");

                        let ajaxReq = $.ajax({
                            url: "assets/includes/handlers/ajax_load_posts.php",
                            type: "POST",
                            data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
                            cache: false,

                            success: function(response) {
                                $('.posts_area').find('.nextPage').remove(); //Removes current .nextpage.
                                $('.posts_area').find('.noMorePosts').remove(); //Removes current .nextpage.

                                $('#loading').hide();
                                $('.posts_area').append(response);
                            }
                        });
                    } // End if

                    return false;

                }); //End (window.scroll(function())).

            });
        </script>
    </body>
</html>