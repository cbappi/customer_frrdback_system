<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>Book Info</h4>
                    </div>
                    <div class="align-items-center col">
                        <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 bg-gradient-primary">Create</button>
                    </div>
                </div>
                <hr class="bg-dark "/>
                <table class="table" id="tableData">
                    <thead>
                        <tr class="bg-light">
                            <th class="table-fixed-width">No</th>
                            <th class="table-fixed-width">User Id</th>
                            <th class="table-fixed-width">Book category</th>
                            <th class="table-fixed-width">Book name</th>
                            <th class="table-fixed-width">Book description</th>
                            <th class="table-fixed-width">Author</th>
                            <th class="table-fixed-width">Publisher</th>
                            <th class="table-fixed-width">ISBN</th>
                            <th class="table-fixed-width">Edition</th>
                            <th class="table-fixed-width">Pages</th>
                            <th class="table-fixed-width">Country</th>
                            <th class="table-fixed-width">Language</th>
                            <th class="table-fixed-width">Image</th>
                            <th class="table-fixed-width">Action</th>
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
        let res = await axios.get("/list-book-info");
        console.log('Response Data:', res.data); // Add this line for debugging

        let tableList = $("#tableList");
        let tableData = $("#tableData");

        tableData.DataTable().destroy();
        tableList.empty();

        res.data.forEach(function (item, index) {
            let row = `<tr>
                <td class="table-fixed-width">${index + 1}</td>
                <td class="table-fixed-width">${item.user_id}</td>
                <td class="table-fixed-width">${item.book_category ? item.book_category.name : 'N/A'}</td>
                <td class="table-fixed-width">${item.book_name}</td>
                <td class="table-fixed-width">${item.book_description}</td>
                <td class="table-fixed-width">${item.author}</td>
                <td class="table-fixed-width">${item.publisher}</td>
                <td class="table-fixed-width">${item.isbn}</td>
                <td class="table-fixed-width">${item.edition}</td>
                <td class="table-fixed-width">${item.pages}</td>
                <td class="table-fixed-width">${item.country}</td>
                <td class="table-fixed-width">${item.language}</td>
                <td class="table-fixed-width"><img class="w-60 h-auto" alt="" src="${item.image_one}"></td>
                <td class="table-fixed-width">
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

