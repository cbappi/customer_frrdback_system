<div class="container">
    <div class="row" id="m-list">
    </div>
</div>




<script>

getList();


async function getList() {


    //showLoader();
    let res=await axios.get("/list-hotel-sub-category");
    //hideLoader();

    let tableList=$("#m-list");




    res.data.forEach(function (item,index) {
        let row=`<div class="col-12 col-md-6 col-lg-4 p-3">
                    <div class="card px-0 text-center">

                        <a href="/by-category-hotel-listy?id=${item['id']}">
                                <img src="${item['categoryImg']}" alt="cat_img1" height=250px/>
                                <div class = "btn btn-outline-primary btn-block mt-1"  >${item['sub_cat_name']}</div>
                        </a>




                    </div>
                 </div>`
        tableList.append(row)
    })

}



</script>

{{-- <a  type="button" class="btn btn-outline-secondary mt-2" !important >${item['cat']}</a> --}}

