<?php include("assets/includes/header.php");
include("assets/includes/classes/User.php");
include("assets/includes/classes/Post.php"); 

if(isset($_POST['post'])) {
    $post = new Post($con, $userLoggedIn);
    $post->submitPost($_POST['post_text'], 'none');
    header("Location: index.php");
}

?>      
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
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider .</p>
                    </div>


                    </div>
                </div>



                <div id="popular" class="card card-body mb-3 col-auto popular2">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider .</p>
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
            $(function(){
            
                var userLoggedIn = '<?php echo $userLoggedIn; ?>';
                var inProgress = false;
            
                loadPosts(); //Load first posts
            
                $(window).scroll(function() {
                    var bottomElement = $(".status_post").last();
                    var noMorePosts = $('.posts_area').find('.noMorePosts').val();
            
                    // isElementInViewport uses getBoundingClientRect(), which requires the HTML DOM object, not the jQuery object. The jQuery equivalent is using [0] as shown below.
                    if (isElementInView(bottomElement[0]) && noMorePosts == 'false') {
                        loadPosts();
                    }
                });
            
                function loadPosts() {
                    if(inProgress) { //If it is already in the process of loading some posts, just return
                        return;
                    }
                    
                    inProgress = true;
                    $('#loading').show();
            
                    var page = $('.posts_area').find('.nextPage').val() || 1; //If .nextPage couldn't be found, it must not be on the page yet (it must be the first time loading posts), so use the value '1'
            
                    $.ajax({
                        url: "assets/includes/handlers/ajax_load_posts.php",
                        type: "POST",
                        data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
                        cache:false,
            
                        success: function(response) {
                            $('.posts_area').find('.nextPage').remove(); //Removes current .nextpage 
                            $('.posts_area').find('.noMorePosts').remove(); //Removes current .nextpage 
                            $('.posts_area').find('.noMorePostsText').remove(); //Removes current .nextpage 
            
                            $('#loading').hide();
                            $(".posts_area").append(response);
            
                            inProgress = false;
                        }
                    });
                }
            
                //Check if the element is in view
                function isElementInView (el) {
                    var rect = el.getBoundingClientRect();
            
                    return (
                        rect.top >= 0 &&
                        rect.left >= 0 &&
                        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && //* or $(window).height()
                        rect.right <= (window.innerWidth || document.documentElement.clientWidth) //* or $(window).width()
                    );
                }
            });
            
        </script>
    </body>
</html>