







<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <Hotel>Hotel Review</h4>
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
                        <th>Resturent name</th>
                        <th>Review title</th>
                        <th>Review description</th>
                        <th>Rating</th>
                        <th>Go with</th>
                        <th>Year</th>
                        <th>Customer name</th>
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
    let res = await axios.get("/list-hotel-review");

    let tableList = $("#tableList");
    let tableData = $("#tableData");

    tableData.DataTable().destroy();
    tableList.empty();

    res.data.forEach(function (item, index) {
        //let categoryName = categoryMap[item['resturent_category_id']];
        let row = `<tr>
            <td>${index + 1}</td>



            <td>${item.hotel ? item.hotel.hotel_name : 'N/A'}</td>

            <td>${item.review_title}</td>
            <td>${item.review_des}</td>
            <td>${item.rating}</td>
            <td>${item.gowith}</td>
            <td>${item.year}</td>
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
