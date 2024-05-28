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
                                    <td>Name</td>
                                    <td>Qty</td>
                                    <td>Total</td>
                                    <td>Remove</td>
                                </tr>
                                </thead>
                                <tbody  class="w-100" id="invoiceList">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr class="mx-0 my-2 p-0 bg-secondary"/>
                    <div class="row">
                       <div class="col-12">
                           <p class="text-bold text-xs my-1 text-dark"> TOTAL ACCESSORIES: <i class="bi bi-currency-dollar"></i> <span id="total"></span></p>
                           <p class="text-bold text-xs my-2 text-dark"> PAYABLE: <i class="bi bi-currency-dollar"></i>  <span id="payable">0</span></p>

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

                                <input type="number" value="0"   id="cm-input" name="decimalInput" min="0" placeholder="0.00" required style="width: 60px;">

                            </div>

                            <div class = "col-sm-4">

                                <span class="text-xxs">WASH:</span>

                                <input type="number" value="0"   id="wash-input" name="decimalInput" min="0" placeholder="0.00" required style="width: 60px;">

                            </div>

                            <div class="col-sm-4">
                                <span class="text-xxs">PRINT:</span>

                                <input type="number" value="0" id="print-input" name="decimalInput" min="0" placeholder="0.00" required style="width: 60px;">

                            </div>

                            <div class="col-sm-4">
                                <span class="text-xxs">EMBROIDARY:</span>

                                <input type="number" value="0"   id="emb-input" name="decimalInput" min="0" placeholder="0.00" required style="width: 60px;">

                            </div>

                            <div class="col-sm-4">
                                <span class="text-xxs">COMISSION:</span>

                                <input type="text"  id="com-input" name="decimalInput" min="0" placeholder="0.00" required style="width: 60px;">

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
                <div class="shadow-sm h-100 bg-white rounded-3 p-3">
                    <table class="table  w-100" id="elementTable">
                        <thead class="w-100">
                        <tr class="text-xs text-bold">
                            <td>Accessories</td>
                            <td>Pick</td>
                        </tr>
                        </thead>
                        <tbody  class="w-100" id="elementList">

                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Product segment finish--}}
            {{-- Customer segment start--}}

            <div class="col-md-4 col-lg-4 p-2">
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

    {{-- Add modal start --}}
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
    {{-- Add modal finish --}}

    <script>

        (async ()=>{
        //   showLoader();
          await  LearnerList();
          await ElementList();
        //   hideLoader();
        })()

        let InvoiceItemList=[];

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

        // Below ShowInvoiceItem() understand and finish
        function removeItem(index) {
            InvoiceItemList.splice(index,1);
            ShowInvoiceItem()
        }

        function CmChange() {
            let CM = document.getElementById('cmP').value

           document.getElementById('cm').innerText = CM;

        }

        function WashChange() {
            let WASH = document.getElementById('washP').value

           document.getElementById('wash').innerText = WASH;

        }

        function PrintChange() {
            let PRINT = document.getElementById('printP').value

           document.getElementById('print').innerText = PRINT;

        }

        function EmbChange() {
            let EMB = document.getElementById('embP').value

            document.getElementById('emb').innerText = EMB;

        }

        function ComChange() {
            let COM = document.getElementById('comP').value

           document.getElementById('com').innerText = COM;

        }

        function CalculateGrandTotal(){
            let Total=0;
            let Payable =0;
            //let cmPercentage=(parseFloat(document.getElementById('cmP').value));
            //let washPercentage=(parseFloat(document.getElementById('washP').value));
            //let printPercentage=(parseFloat(document.getElementById('printP').value));

            InvoiceItemList.forEach((item,index)=>{
                Total=Total+parseFloat(item['sale_price'])
            })

            Total = Total*1;
            document.getElementById('total').innerText=Total;

           // Payable=(parseFloat(cmPercentage)+parseFloat(washPercentage)+parseFloat(printPercentage)).toFixed(2;)

            //document.getElementById('payable').innerText= Payable;

            //document.getElementById('emb').innerText=Emb;
            //document.getElementById('print').innerText=Print;
            //document.getElementById('payable').innerText=Total+Cm+Wash+Emb+Print+Com;
            //document.getElementById('payable').innerText=Total + x +y;

        }

        // function CalculateAll(){

        //     document.getElementById('payable').innerText= document.getElementById('cm').innerText+
        //     document.getElementById('wash').innerText;

        //     }



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

    // Below add() understand and finish


    // Below addModal(id,name,price) understand and start

        function addModal(id,name,price) {
            document.getElementById('PId').value=id
            document.getElementById('PName').value=name
            document.getElementById('PPrice').value=price
            $('#create-modal').modal('show')
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

        // Below ProductList() understand and finish

      async  function createInvoice() {
            let total=document.getElementById('total').innerText;
            let discount=document.getElementById('discount').innerText
            let vat=document.getElementById('vat').innerText
            let payable=document.getElementById('payable').innerText
            let CId=document.getElementById('CId').innerText;

            let Data={
                "total":total,
                "discount":discount,
                "vat":vat,
                "payable":payable,
                "customer_id":CId,
                "products":InvoiceItemList
            }

            if(CId.length===0){
                errorToast("Customer Required !")
            }
            else if(InvoiceItemList.length===0){
                errorToast("Product Required !")
            }
            else{

                showLoader();
                let res=await axios.post("/invoice-create",Data)
                hideLoader();
                if(res.data===1){
                    window.location.href='/invoicePage'
                    successToast("Invoice Created");
                }
                else{
                    errorToast("Something Went Wrong")
                }
            }

        }







        document.getElementById('fob-button').addEventListener('click', function(){
    // step-2: get the deposit amount from the deposit input field
    // For input field use .value to the the value inside the input field
    // const depositField = document.getElementById('deposit-field');
    // const newDepositAmountString = depositField.value;
    // const newDepositAmount = parseFloat(newDepositAmountString);

    const totalField = document.getElementById('total');
    const newtotalFieldString = totalField.innerText;
    const newtotalFieldAmount = parseFloat(newtotalFieldString);

    const cmField = document.getElementById('cm-input');
    const newCmString = cmField.value;
    const newCmStringAmount = parseFloat(newCmString);


    const washField = document.getElementById('wash-input');
    const newWashString = washField.value;
    const newWashStringAmount = parseFloat(newWashString);


    const embField = document.getElementById('emb-input');
    const newEmbString = embField.value;
    const newEmbStringAmount = parseFloat(newEmbString);


    const printField = document.getElementById('print-input');
    const newPrintString = printField.value;
    const newPrintStringAmount = parseFloat(newPrintString);

    // step-3: get the current deposit total
    // for non-input(element other than input, textarea) use innerText to get the text
    // const payableElement = document.getElementById('payable');
    // const payableElementString = payableElement.innerText;
    // const previousPayableAmount = parseFloat(payableElementString);

    const payableElement = document.getElementById('payable');
    const payableElementString = payableElement.innerText;


    // step-4: add numbers to set the total deposit
    // const currentsPayableAmount = newEmbStringAmount + previousPayableAmount + newWashStringAmount + newCmStringAmount+ newPrintStringAmount + newtotalFieldAmount;

    // const currentsPayableAmount = newEmbStringAmount + previousPayableAmount + newWashStringAmount + newCmStringAmount+ newPrintStringAmount + newtotalFieldAmount;

   // console.log(currentsPayableAmount);
    // set the deposit total
    payableElement.innerText = newEmbStringAmount  + newWashStringAmount + newCmStringAmount+ newPrintStringAmount + newtotalFieldAmount;

    printField.value = '';
    cmField.value  = '';
    embField.value = '';
    washField.value = '';

    // step-5: get ballance current total


    // const balanceTotalElement = document.getElementById('balance-total');
    // const previousBalanceTotalString = balanceTotalElement.innerText;
    // const previousBalanceTotal = parseFloat(previousBalanceTotalString);

    // step-6: calculate current total balance



   // const currentBalanceTotal = previousBalanceTotal + newDepositAmount;
    // set the balance total




    //balanceTotalElement.innerText = currentBalanceTotal;

    // step-7: clear the deposit field



    //depositField.value = '';
})

    </script>



@endsection
