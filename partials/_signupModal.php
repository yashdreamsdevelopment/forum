<?php
echo '<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sign Up for iDiscuss</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="partials/_handleSignup.php" method="POST">
                            <div class="mb-3">
                                <label for="signupUsername" class="form-label">Username</label>
                                <input type="text" class="form-control" placeholder="Enter your username" required id="signupUsername"
                                    name="signupUsername">

                            </div>
                            <div class="mb-3">
                                <label for="signupPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="choose your password" required id="signupPassword"
                                    name="signupPassword">
                            </div>
                            <div class="mb-3">
                                <label for="signupCpassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Re-Enter your password"
                                    id="signupCpassword" required name="signupCpassword">
                            </div>

                            <button type="submit" class="btn btn-primary">SignUp</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>';

?>