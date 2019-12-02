$(function() {
    $('.modal').modal()

    let allPosts = []

    const $postsContainer = $("#posts-container")
    const $loginButton = $('#login-button')
    const $signupButton = $('#signup-button')
    const $loginSignupForm = $("#login-signup-form")
    const $postForm = $("#post-form")
    const $loginLink = $("#login-link")
    const $headerDiv = $(".header-content")

    function signupLoginData() {
        return $loginSignupForm.serialize()
        var data = $('#login-signup-form').serializeArray().reduce(function(obj, item) {
            // {name: 'username', value: 'foo'}
            obj[item.name] = item.value;
            return obj;
        }, {});
        return data;
    }

    function persistLoginState(username, id) {
        window.localStorage.setItem('loggedInId', id);
        window.localStorage.setItem('loggedInUserName', username);
    }

    function getLoginState() {
        var loggedInId = window.localStorage.getItem('loggedInId');
        var loggedInUserName = window.localStorage.getItem('loggedInUserName');
        var data = {};
        if (loggedInId && loggedInUserName) { //it means both loggedInId and loggedInUserName are not null or undefined
            data = {
                id: loggedInId,
                username: loggedInUserName
            }
        }
        return data;
    }

    function clearLoggedInState() {
        window.localStorage.removeItem('loggedInId');
        window.localStorage.removeItem('loggedInUserName');
    }

    function showAndHideLoginBtn() {
        var loggedInInfo = getLoginState();
        if (loggedInInfo.hasOwnProperty('username')) {
            $loginLink.addClass('hide');
            var displayText = loggedInInfo['username'];
            $headerDiv.append("<h2 id='logged_in_heading'>" + displayText + "</h2>");
        } else {
            $loginLink.removeClass('hide');
            $('#logged_in_heading').remove();
        }
    }

    function setupSinglePostElement(post) {
        // Create the element using the function in the elements file
        const element = postElement(post)

        // When the more comments link is clicked, 
        // open a new modal that contains that post's comments
        element.find('.post__view-all-comments').on('click', function() {
            fetchComments(post.id)
                .then(comments => {
                    const element = allCommentsElement(post, comments)
                    $("#comments-modal .modal-content").empty().append(element)
                })
        })

        return element
    }

    // Loop through an array of posts and display them on the page
    function displayPosts(posts) {
        $postsContainer.empty()
        for (const post of posts) {
            const element = setupSinglePostElement(post)
            $postsContainer.append(element)
        }
    }

    // As soon as the page loads, fetch all of the posts from the api
    fetchAllPosts()
        .then(posts => {
            allPosts = posts
            displayPosts(allPosts)
        })
        .catch(error => {
            console.log("Error", error)
        })


    /*
     * Event Listeners
     */

    $postForm.on("submit", function(event) {
        event.preventDefault();
        console.log("insta post form submitted");
    })

    $signupButton.on('click', function(event) {
        event.preventDefault();
        // const data = $loginSignupForm.serialize()
        var data = signupLoginData();
        signUp(data)
            .then(function(resp, status) {
                console.log(resp);
                persistLoginState(resp['username'], resp['id']);
                showAndHideLoginBtn();
                console.log('resp', resp);
                console.log('status', status);
            })
            .catch(function(err, status) {
                console.log('status', status);
                console.log('err', err);
            })
    });

    $loginButton.on('click', function(event) {
        event.preventDefault();
        var data = signupLoginData();
        login(data)
            .then(function(resp, status) {
                console.log(resp);
                persistLoginState(resp['username'], resp['id']);
                showAndHideLoginBtn();
                console.log('status', status);
                console.log('resp', resp);
            })
            .catch(function(err, status) {
                console.log('status', status);
                console.log('err', err);
            })
    });

    showAndHideLoginBtn();
})