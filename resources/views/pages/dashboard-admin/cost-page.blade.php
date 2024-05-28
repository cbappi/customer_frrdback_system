@extends('layout.sidenav-layout')
@section('content')

<script>
    window.onload = function() {
        // Get the element by its ID
        var element = document.getElementById("total");

        // Set the inner text to "0"
        element.innerText = "0";
    };
</script>
    <div class="container-fluid">
        <div class="row">

            {{-- Invoice segment --}}
            <div class="col-md-4 col-lg-4 p-2">
                <div class="shadow-sm h-100 bg-white rounded-3 p-3">
                    <div class="row">
                        <div class="col-8">
                            <span class="text-bold text-dark">COST SHEET </span>
                            <p class="text-xs mx-0 my-1">Name:  <span id="CName"></span> </p>
                            <p class="text-xs mx-0 my-1">Cell:  <span id="CCell"></span></p>
                            <p class="text-xs mx-0 my-1">User ID:  <span id="CId"></span> </p>
                        </div>
                        <div class="col-4">
                            <img class="w-50" src="{{"images/logo.png"}}">
                            <p class="text-bold mx-0 my-1 text-dark">Cost  </p>
                            <p class="text-xs mx-0 my-1">Date: {{ date('Y-m-d') }} </p>
                        </div>
                    </div>
                    <hr class="mx-0 my-2 p-0 bg-secondary"/>
                    <div class="row">
                        <div class="col-12">
                            <table class="table w-100" id="invoiceTable">
                                <thead class="w-100">
                                <tr class="text-xs">
                                    <td> Accs Name</td>
                                    <td>Qty</td>
                                    <td>Total</td>
                                    <td>Remove</td>
                                </tr>
                                </thead>
                                <tbody  class="w-100" id="invoiceList">

                                </tbody>
                            </table>
                        </div>

                        <div class="col-12">
                            <table class="table w-100" id="invoiceTable2">
                                <thead class="w-100">
                                <tr class="text-xs">
                                    <td> Fab Name</td>
                                    <td>Qty</td>
                                    <td>Total</td>
                                    <td>Remove</td>
                                </tr>
                                </thead>
                                <tbody  class="w-100" id="invoiceList2">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr class="mx-0 my-2 p-0 bg-secondary"/>
                    <div class="row">
                       <div class="col-12">
                           <p class="text-bold text-xs my-1 text-dark"> TOTAL ACCESSORIES: <i class="bi bi-currency-dollar"></i> <span id="total"></span></p>

                           <p class="text-bold text-xs my-1 text-dark"> TOTAL FABRIC: <i class="bi bi-currency-dollar"></i> <span id="totalfabric"></span></p>
                           <p class="text-bold text-xs my-2 text-dark"> FOB: <i class="bi bi-currency-dollar"></i>  <span id="payable">0</span></p>

                           <table class="table">

                            <tbody>
                              <tr>

                                <td><p class="text-bold text-xs my-1 text-dark"> CM: <i class="bi bi-currency-dollar"></i>  <span id="cm"></span></p></td>
                                <td><p class="text-bold text-xs my-1 text-dark"> WASH: <i class="bi bi-currency-dollar"></i>  <span id="wash"></span></p></td>

                              </tr>
                              <tr>

                                <td><p class="text-bold text-xs my-1 text-dark"> PRINT: <i class="bi bi-currency-dollar"></i><span id="print"></span></p>
                                </td>
                                <td><p class="text-bold text-xs my-1 text-dark"> EMBROIDARY: <i class="bi bi-currency-dollar"></i>  <span id="emb"></span></p></td>

                              </tr>
                              <tr>

                                <td><p class="text-bold text-xs my-1 text-dark">COMISSION: <i class="bi bi-currency-dollar"></i><span id="com"></span></p>
                                </td>
                                <td></td>

                              </tr>

                            </tbody>
                          </table>



                        <div class="row">

                            <div class = "col-sm-4">

                                <span class="text-xxs">CM:</span>

                                <input type="text" value="0"   id="cm-input" name="decimalInput" min="0" placeholder="0.00" required style="width: 50px;">

                            </div>

                            <div class = "col-sm-4">

                                <span class="text-xxs">WASH:</span>

                                <input type="text" value="0"   id="wash-input" name="decimalInput" min="0" placeholder="0.00" required style="width: 50px;">

                            </div>

                            <div class="col-sm-4">
                                <span class="text-xxs">PRINT:</span>

                                <input type="text" value="0" id="print-input" name="decimalInput" min="0" placeholder="0.00" required style="width: 50px;">

                            </div>

                            <div class="col-sm-4">
                                <span class="text-xxs">EMBROIDARY:</span>

                                <input type="text" value="0"   id="emb-input" name="decimalInput" min="0" placeholder="0.00" required style="width: 50px;">

                            </div>

                            <div class="col-sm-4">
                                <span class="text-xxs">COMISSION:</span>

                                <input type="text"  id="com-input" name="decimalInput" min="0" placeholder="0.00" required style="width: 50px;">

                            </div>

                        </div>
                        <button type="button" id="fob-button" class="btn btn-primary mt-2" style="width: 300px !important;">Get FOB</button>

                        <p>
                            <button onclick="createInvoice()" class="btn  my-3 bg-gradient-primary w-40">Confirm</button>
                         </p>







                       </div>
                        <div class="col-12 p-2">

                        </div>

                    </div>
                </div>
            </div>
            {{-- Product segment start--}}
            <div class="col-md-4 col-lg-4 p-2">
                <div class="shadow-sm h-100 bg-white rounded-3 p-2">
                    <table class="table  w-100" id="elementTable">
                        <thead class="w-100">
                        <tr class="text-xs text-bold">
                            <td>Accessories</td>
                            <td>Add</td>
                        </tr>
                        </thead>
                        <tbody  class="w-100" id="elementList">

                        </tbody>
                    </table>

                    <table class="table  w-100" id="fabricTable">
                        <thead class="w-100">
                        <tr class="text-xs text-bold">
                            <td>Fabrics</td>
                            <td>Add</td>
                        </tr>
                        </thead>
                        <tbody  class="w-100" id="fabricList">

                        </tbody>
                    </table>
                </div>
            </div>





            {{-- Product segment finish--}}
            {{-- Customer segment start--}}

            <div class="col-md-3 col-lg-3 p-2">
                <div class="shadow-sm h-100 bg-white rounded-3 p-3">
                    <table class="table table-sm w-100" id="learnerTable">
                        <thead class="w-100">
                        <tr class="text-xs text-bold">
                            <td>Buyer</td>
                            <td>Pick</td>
                        </tr>
                        </thead>
                        <tbody  class="w-100" id="learnerList">

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
     {{-- Customer segment finish--}}
    {{-- Customer segment finish--}}

    {{-- Add modal start for Accessories --}}
   <div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Add One Accessories</h6>
                </div>
                <div class="modal-body">
                    <form id="add-form">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 p-1">
                                    <label class="form-label">Accessories ID *</label>
                                    <input type="text" class="form-control" id="PId">
                                    <label class="form-label mt-2">Accessories Name *</label>
                                    <input type="text" class="form-control" id="PName">
                                    <label class="form-label mt-2">Accessoriest Unit Price *</label>
                                    <input type="text" class="form-control" id="PPrice">
                                    <label class="form-label mt-2">Accesories Qty *</label>
                                    <input type="text" class="form-control" id="PQty">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="add()" id="save-btn" class="btn bg-gradient-success" >Add</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Add modal finish for Accessories--}}
    {{-- Add modal start for Fabrics --}}

    <div class="modal animated zoomIn" id="create-modal-b" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Add Fabric</h6>
                </div>
                <div class="modal-body">
                    <form id="add-form">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 p-1">
                                    <label class="form-label">Accessories ID *</label>
                                    <input type="text" class="form-control" id="PIdd">
                                    <label class="form-label mt-2">Accessories Name *</label>
                                    <input type="text" class="form-control" id="PNamee">
                                    <label class="form-label mt-2">Accessoriest Unit Price *</label>
                                    <input type="text" class="form-control" id="PPricee">
                                    <label class="form-label mt-2">Accesories Qty *</label>
                                    <input type="text" class="form-control" id="PQtyy">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="addd()" id="save-btn" class="btn bg-gradient-success" >Add</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Add modal finish for Fabrics --}}

    <script>

        (async ()=>{
        //   showLoader();
          await  LearnerList();
          await ElementList();
          await FabricList();
        //   hideLoader();
        })()

        let InvoiceItemList=[];
        let InvoiceItemList2=[];

      // Below ShowInvoiceItem() understand and start
        function ShowInvoiceItem() {

            let invoiceList=$('#invoiceList');

            invoiceList.empty();

            InvoiceItemList.forEach(function (item,index) {
                let row=`<tr class="text-xs">
                        <td>${item['product_name']}</td>
                        <td>${item['qty']}</td>
                        <td>${item['sale_price']}</td>
                        <td><a data-index="${index}" class="btn remove text-xxs px-2 py-1  btn-sm m-0">Remove</a></td>
                     </tr>`
                invoiceList.append(row)
            })

            CalculateGrandTotal();

            $('.remove').on('click', async function () {
                let index= $(this).data('index');
                removeItem(index);
            })

        }

        function ShowInvoiceItem2() {

let invoiceList2=$('#invoiceList2');

invoiceList2.empty();

InvoiceItemList2.forEach(function (item,index) {
    let row=`<tr class="text-xs">
            <td>${item['fab_name']}</td>
            <td>${item['fab_qty']}</td>
            <td>${item['fab_sale_price']}</td>
            <td><a data-index="${index}" class="btn remove2 text-xxs px-2 py-1  btn-sm m-0">Remove</a></td>
         </tr>`
    invoiceList2.append(row)
})

CalculateGrandTotal2();

$('.remove2').on('click', async function () {
    let index= $(this).data('index');
    removeItem2(index);
})

}

        // Below ShowInvoiceItem() understand and finish
        function removeItem(index) {
            InvoiceItemList.splice(index,1);
            ShowInvoiceItem()
        }

        function removeItem2(index) {
            InvoiceItemList2.splice(index,1);
            ShowInvoiceItem2()
        }

        function CalculateGrandTotal(){
            let Total=0;
            let Payable =0;

            InvoiceItemList.forEach((item,index)=>{
                Total=Total+parseFloat(item['sale_price'])
            })

            Total = Total*1;
            document.getElementById('total').innerText=Total;

        }

        function CalculateGrandTotal2(){
            let Total=0;
            let Payable =0;

            InvoiceItemList2.forEach((item,index)=>{
                Total=Total+parseFloat(item['fab_sale_price'])
            })

            Total = Total*1;
            document.getElementById('totalfabric').innerText=Total;

        }

        // Below add() understand and start
        function add() {
           let PId= document.getElementById('PId').value;
           let PName= document.getElementById('PName').value;
           let PPrice=document.getElementById('PPrice').value;
           let PQty= document.getElementById('PQty').value;
           let PTotalPrice=(parseFloat(PPrice)*parseFloat(PQty)).toFixed(2);
           if(PId.length===0){
               errorToast("Product ID Required");
           }
           else if(PName.length===0){
               errorToast("Product Name Required");
           }
           else if(PPrice.length===0){
               errorToast("Product Price Required");
           }
           else if(PQty.length===0){
               errorToast("Product Quantity Required");
           }
           else{
               let item={product_id:PId,product_name:PName,qty:PQty,sale_price:PTotalPrice};
               InvoiceItemList.push(item);
               console.log(InvoiceItemList);
               $('#create-modal').modal('hide')
               ShowInvoiceItem();
           }
        }

        function addd() {
           let PIdd= document.getElementById('PIdd').value;
           let PNamee= document.getElementById('PNamee').value;
           let PPricee=document.getElementById('PPricee').value;
           let PQtyy= document.getElementById('PQtyy').value;
           let PTotalPrice=(parseFloat(PPricee)*parseFloat(PQtyy)).toFixed(2);
           if(PIdd.length===0){
               errorToast("Product ID Required");
           }
           else if(PNamee.length===0){
               errorToast("Product Name Required");
           }
           else if(PPricee.length===0){
               errorToast("Product Price Required");
           }
           else if(PQtyy.length===0){
               errorToast("Product Quantity Required");
           }
           else{
               let item={fab_id:PIdd,fab_name:PNamee,fab_qty:PQtyy,fab_sale_price:PTotalPrice};
               InvoiceItemList2.push(item);
               console.log(InvoiceItemList2);
               $('#create-modal-b').modal('hide')
               ShowInvoiceItem2();
           }
        }

    // Below add() understand and finish

    // Below addModal(id,name,price) understand and start

        function addModal(id,name,price) {
            document.getElementById('PId').value=id
            document.getElementById('PName').value=name
            document.getElementById('PPrice').value=price
            $('#create-modal').modal('show')
        }


        function addModall(idd, namee, pricee) {
    document.getElementById('PIdd').value = idd;
    document.getElementById('PNamee').value = namee;
    document.getElementById('PPricee').value = pricee;
    $('#create-modal-b').modal('show');
}

    // Below addModal(id,name,price) understand and start
    //Below CustomerList() understand and start
        async function LearnerList(){
            let res=await axios.get("/list-learner");
            let customerList=$("#learnerList");
            let customerTable=$("#learnerTable");
            customerTable.DataTable().destroy();
            customerList.empty();

            res.data.forEach(function (item,index) {
                let row=`<tr class="text-xs">
                        <td><i class="bi bi-person"></i> ${item['name']}</td>
                        <td><a data-name="${item['name']}" data-cell="${item['cell']}" data-id="${item['id']}" class="btn btn-outline-dark addLearner  text-xxs px-2 py-1  btn-sm m-0">Add</a></td>
                     </tr>`
                customerList.append(row)
            })

            $('.addLearner').on('click', async function () {

                let CName= $(this).data('name');
                let CCell= $(this).data('cell');
                let CId= $(this).data('id');

                $("#CName").text(CName)
                $("#CCell").text(CCell)
                $("#CId").text(CId)

            })

            new DataTable('#learnerTable',{
                order:[[0,'desc']],
                scrollCollapse: false,
                info: false,
                lengthChange: false
            });
        }

        // Below CustomerList() understand and finish
        // Below ProductList() understand and start
        async function ElementList(){
            let res=await axios.get("/list-element");
            let elementList=$("#elementList");
            let elementTable=$("#elementTable");
           elementTable.DataTable().destroy();
            elementList.empty();

            res.data.forEach(function (item,index) {
                let row=`<tr class="text-xs">
                        <td>  ${item['accessories']} ($ ${item['amount']})</td>
                        <td><a data-id="${item['id']}" data-accessories="${item['accessories']}" data-amount="${item['amount']}"  class="btn btn-outline-dark text-xxs px-2 py-1 addElement  btn-sm m-0">Add</a></td>
                     </tr>`
               elementList.append(row)
            })

            $('.addElement').on('click', async function () {

                let PId= $(this).data('id');
                let PName= $(this).data('accessories');
                let PPrice= $(this).data('amount');

                addModal(PId,PName,PPrice)
            })

            new DataTable('#elementTable',{
                order:[[0,'desc']],
                scrollCollapse: false,
                info: false,
                lengthChange: false
            });
        }

        async function FabricList(){
    let res = await axios.get("/list-fabric");
    let elementList = $("#fabricList");
    let elementTable = $("#fabricTable");
    elementTable.DataTable().destroy();
    elementList.empty();

    res.data.forEach(function(item, index) {
        let row = `<tr class="text-xs">
                    <td>  ${item['fabname']} ($ ${item['unitprice']})</td>
                    <td><a data-id="${item['id']}" data-fabname="${item['fabname']}" data-unitprice="${item['unitprice']}" class="btn btn-outline-dark text-xxs px-2 py-1 addFabric btn-sm m-0">Add</a></td>
                  </tr>`;
        elementList.append(row);
    });

    $('.addFabric').on('click', async function() {
        let PIdd = $(this).data('id');
        let PNamee = $(this).data('fabname');
        let PPricee = $(this).data('unitprice');

        addModall(PIdd, PNamee, PPricee);
    });

    new DataTable('#fabricTable', {
        order: [[0, 'desc']],
        scrollCollapse: true,
        info: true,
        lengthChange: true
    });
}


        // Below ProductList() understand and finish



     async function createInvoice() {
    let total = document.getElementById('total').innerText;
    let totalfabric = document.getElementById('totalfabric').innerText;
    let cm = document.getElementById('cm').innerText;
    let wash = document.getElementById('wash').innerText;
    let print = document.getElementById('print').innerText;
    let emb = document.getElementById('emb').innerText;
    let com = document.getElementById('com').innerText;
    let payable = document.getElementById('payable').innerText;
    let CId = document.getElementById('CId').innerText;

    let Data = {
        "total": total,
        "total_fabric": totalfabric,
        "cm": cm,
        "wash": wash,
        "emb": emb,
        "print": print,
        "comission": com,
        "payable": payable,
        "learner_id": CId,
        "elements": InvoiceItemList,
        "fabrics": InvoiceItemList2
    };

    try {
        showLoader();
        let res = await axios.post("/sheet-create", Data);
        hideLoader();

        if (res.data === 1) {
            window.location.href = '/salePageSheet';
            successToast("Sheet Created");
        } else {

            //console.error('Error creating invoice:', error);
            errorToast("fgh");
        }
    } catch (error) {
        hideLoader();
        console.error('Error creating invoice:', error);
        errorToast("An unexpected error occurred");
    }
}

const total_text = document.getElementById('total');
const total_fab_text = document.getElementById('totalfabric');
const payable_text = document.getElementById('payable');

const fob_button = document.getElementById('fob-button');
const cm_input = document.getElementById('cm-input');
const cm_text = document.getElementById('cm');


const com_input = document.getElementById('com-input');
const com_text = document.getElementById('com');


const wash_input = document.getElementById('wash-input');
const wash_text = document.getElementById('wash');
const print_input = document.getElementById('print-input');
const print_text = document.getElementById('print');
const emb_input = document.getElementById('emb-input');
const emb_text = document.getElementById('emb');

fob_button.addEventListener('click', function(){

    payable_text.innerText = parseFloat(cm_input.value);
    cm_text.innerText = parseFloat(cm_input.value);

    com_text.innerText = parseFloat(com_input.value);


    wash_text.innerText = parseFloat(wash_input.value);
    print_text.innerText = parseFloat(print_input.value);
    emb_text.innerText = parseFloat(emb_input.value);

    totalPrice();

});

function totalPrice(){

  const comission =  parseFloat(com_input.value);

  const cmPrice = parseFloat(cm_input.value);
  const washPrice = parseFloat(wash_input.value);
  const printPrice = parseFloat(print_input.value);
  const embPrice = parseFloat(emb_input.value);
  const grandTotal = cmPrice + washPrice + printPrice + embPrice + parseFloat(total_text.innerText) + parseFloat(total_fab_text.innerText);

  payable_text.innerText = (grandTotal)+(grandTotal*comission/100);

  }


    </script>


@endsection


