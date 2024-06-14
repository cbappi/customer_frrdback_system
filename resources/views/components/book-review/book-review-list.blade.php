<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>Book Review</h4>
                    </div>
                    <div class="align-items-center col">
                        <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 bg-gradient-primary">Create</button>
                    </div>
                </div>
                <hr class="bg-dark "/>
                <table class="table" id="tableData">
                    <thead>
                    <tr class="bg-light">
                        <th>No</th>
                        <th>Book name</th>
                        <th>Review title</th>
                        <th>Review description</th>
                        <th>Rating</th>
                        <th>Review type</th>
                        <th>Reviewer name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="tableList">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    async function getList() {
        let res = await axios.get("/list-book-review");
        console.log('Response Data:', res.data); // Log the response data to debug

        let tableList = $("#tableList");
        let tableData = $("#tableData");

        tableData.DataTable().destroy();
        tableList.empty();

        res.data.forEach(function (item, index) {
            console.log(item);  // Log the item to check its structure
            let row = `<tr>
                <td>${index + 1}</td>
                <td>${item.book_info ? item.book_info.book_name : 'N/A'}</td> <!-- Corrected key -->
                <td>${item.review_title}</td>
                <td>${item.review_des}</td>
                <td>${item.rating}</td>
                <td>${item.review_type}</td>
                <td>${item.name}</td>
                <td>${item.email}</td>
                <td>
                    <button data-id="${item.id}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                    <button data-id="${item.id}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                </td>
            </tr>`;
            tableList.append(row);
        });

        $('.editBtn').on('click', async function () {
            let id = $(this).data('id');
            await FillUpUpdateForm(id);
            $("#update-modal").modal('show');
        });

        $('.deleteBtn').on('click', function () {
            let id = $(this).data('id');
            $("#delete-modal").modal('show');
            $("#deleteID").val(id);
        });

        new DataTable('#tableData', {
            order: [[0, 'desc']],
            lengthMenu: [5, 10, 15, 20, 30]
        });
    }

    getList();
    </script>