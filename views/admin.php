<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h3>
                   Admin table 
                </h3>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover table-bordered" id="task-table">
                    <thead>
                        <tr>
                            <th scope="col" class="th-number">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Text</th>
                            <th scope="col" width="220px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($params["table"] as $item) :?>
                        <tr class="row-point">
                            <th scope="row"><?php echo($item["Id"]);?></th>
                            <td><?php echo($item["Name"]);?></td>
                            <td><?php echo($item["Email"]);?></td>
                            <td><?php echo($item["Text"]);?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">
                                        Change
                                    </button>
                                    <?php if (empty($item["Completed"])) :?>
                                    <form class="m-0 p-0 mx-2" action="/completetask" method="POST">
                                        <input type="hidden" name="Id" value="$item['Id']">
                                        <button type="submit" class="btn btn-success btn-sm">
                                            Complete
                                        </button>
                                    </form>
                                    <?php else :?>
                                    <button type="button" class="btn btn-secondary btn-sm mx-2" disabled>
                                        Completed
                                    </button>
                                    <?php endif ;?>
                                    
                                    <?php echo(!empty($item["Updated_at"]) ? '<span class="td-updated">Updated...</span>' : '') ;?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ;?>
<!--                         <tr class="row-point">
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">Change</button>
                                <button type="button" class="btn btn-success btn-sm">Complete</button>
                            </td>
                        </tr>
                        <tr class="row-point">
                            <th scope="row">3</th>
                            <td>Larry the Bird</td>
                            <td>Flint</td>
                            <td>@twitter</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">Change</button>
                                <button type="button" class="btn btn-secondary btn-sm" disabled>Completed</button>
                            </td> -->
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Change task
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Student name:</label>
                                    <input class="form-control" type="text" placeholder="Firstname Lastname" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email address:</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">New task's text:</label>
                                    <textarea class="form-control <?php echo($model->hasError('name') ? 'is-invalid' : '');?>" id="exampleFormControlTextarea1" rows="4" maxlength="255" name="new_text" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    Close
                                </button>
                                <button  type="submit" class="btn btn-primary">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
