<div class="container">
    <div class="row" id="m-list">
    </div>
</div>




<script>

getList();


async function getList() {


    //showLoader();
    let res=await axios.get("/list-front-category");
    //hideLoader();

    let tableList=$("#m-list");




    res.data.forEach(function (item,index) {
        let row=`<div class="col-12 col-md-6 col-lg-4 p-3">
                    <div class="card px-0 text-center">

                        <div>
                            <img class="card-img-top" src="${item['image']}" alt="" height=250 px>
                        <div>

                       <div>
                            <a href="${generateUrl(item['page_url'])}" type="button" class="btn btn-outline-secondary mt-2">${item['cat']}</a>
                       </div
                    </div>
                 </div>`
        tableList.append(row)
    })

}

function generateUrl(pageUrl) {
  
    const baseUrl = document.querySelector('meta[name="base-url"]').content;
    return `${baseUrl}/${pageUrl}`;
}

</script>

{{-- <a  type="button" class="btn btn-outline-secondary mt-2" !important >${item['cat']}</a> --}}

