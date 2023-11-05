<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-8 m-auto mt-3">
                    <div class="col-12">
                        <div>
                            <strong>Created date: </strong>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            {{-- Customer Details --}}
                            <div class="row">
                                {{-- Customer data --}}
                                <div class="col-md-6 text-right">
                                    <div class="mb-2"><strong>Customer Name: </strong>add</div>
                                    <div class="mb-2"><strong>Customer Phone: </strong>add
                                    </div>
                                    <div class="mb-2"><strong>Customer Address: </strong>add
                                    </div>
                                    <div class="mb-2"><strong>Customer Place of work:
                                        </strong>add</div>
                                </div>

                                {{-- Guarantor data --}}
                                <div class="col-md-6 text-right">
                                    <div class="mb-2"><strong>Guarantor Name: </strong>adad
                                    </div>
                                    <div class="mb-2"><strong>Guarantor Phone: </strong>adada
                                    </div>
                                    <div class="mb-2"><strong>Guarantor Address:
                                        </strong>add</div>
                                    <div class="mb-2"><strong>Guarantor Place of work:
                                        </strong>asd</div>
                                </div>
                            </div>

                            {{-- Product Details --}}
                            {{-- @foreach ($items as $item) --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row border">
                                        <div class="col-md-6">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th>Item Name: </th>
                                                        <td>2500</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Actual Price: </th>
                                                        <td>24000</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Down Payment: </th>
                                                        <td>2500</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Item Balance: </th>
                                                        <td>2500</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-md-6">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th>Profit: </th>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Due: </th>
                                                        <td>25000</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Per Month: </th>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total:</th>
                                                        <td>25000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- @endforeach --}}
                        </div>

                        {{-- @if (count($items) > 0) --}}
                        <div class="mx-1">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Installment</th>
                                        <th scope="col">Remaining</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    {{-- @foreach ($item->installments as $installment) --}}
                                    <tr>
                                        <td>10/03/2024</td>
                                        <th>2000</th>
                                        <td>20000</td>
                                    </tr>
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                        {{-- @else
                            <div class="alert alert-info m-4 text-center">No record found</div>
                        @endif --}}

                        <div class="row justify-content-end mx-3">
                            <div class="col-auto">
                                {{-- {{ $items->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
