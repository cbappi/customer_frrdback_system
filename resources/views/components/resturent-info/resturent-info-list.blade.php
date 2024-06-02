<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>Resturent Info</h4>
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
                        <th>User name</th>
                        <th>Hotel category</th>
                        <th>Hotel name</th>
                        <th>Description</th>
                        <th>Amenities</th>
                        <th>Hotel type</th>
                        <th>Room feature</th>
                        <th>Room type</th>
                        <th>Start Room price</th>
                        <th>Last Room price</th>
                        <th>Discount</th>
                        <th>Country</th>
                        <th>District</th>
                        <th>Address</th>
                        <th>Website</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Image-1</th>
                        <th>Image-2</th>
                        <th>Image-3</th>
                        <th>Image-4</th>
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
    let res = await axios.get("/list-resturent-info");

    let tableList = $("#tableList");
    let tableData = $("#tableData");

    tableData.DataTable().destroy();
    tableList.empty();

    res.data.forEach(function (item, index) {
        let row = `<tr>
            <td>${index + 1}</td>
            <td>${item.user_id}</td>
            <td>${item.cat ? item.cat.name : 'N/A'}</td>
            <td>${item.resturent_name}</td>
            <td>${item.resturent_description}</td>
            <td>${item.features}</td>
            <td>${item.cuisines}</td>
            <td>${item.special_diets}</td>
            <td>${item.meals}</td>
            <td>${item.discount}</td>
            <td>${item.price_range_start}</td>
            <td>${item.price_range_last}</td>
            <td>${item.open_time}</td>
            <td>${item.close_time}</td>
            <td>${item.address}</td>
            <td>${item.website}</td>
            <td>${item.email}</td>
            <td>${item.phone}</td>
            <td><img class="w-60 h-auto" alt="" src="${item.image_one}"></td>
            <td><img class="w-60 h-auto" alt="" src="${item.image_two}"></td>
            <td><img class="w-60 h-auto" alt="" src="${item.image_three}"></td>
            <td><img class="w-60 h-auto" alt="" src="${item.image_four}"></td>
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
