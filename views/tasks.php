<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-8">
                <h3>
                   Tasks table 
                </h3>
                <br>
                <table class="table table-striped display table-bordered" id="task-table">
                    <thead>
                        <tr>
                            <th scope="col" class="th-number">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Task</th>
                            <th scope="col" class="td-completed">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark One</td>
                            <td>otto@gmail.com</td>
                            <td>mdo</td>
                            <td class="td-center">
                                Completed
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton@gmail.com</td>
                            <td>fat</td>
                            <td class="td-center"></td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                            <td>Larry</td>
                            <td>theBird@gmail.com</td>
                            <td>twitter</td>
                            <td class="td-center"></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton@gmail.com</td>
                            <td>fat</td>
                            <td></td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                            <td>Larry</td>
                            <td>theBird@gmail.com</td>
                            <td>twitter</td>
                            <td class="td-center"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                <h3>
                   Create new task 
                </h3>
                <br>
                <div class="create-field p-3">
                    <form method="POST" action="/taskget">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Student name:</label>
                            <input class="form-control" type="text" placeholder="Firstname Lastname" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address:</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Task's text:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" maxlength="255" name="task" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>