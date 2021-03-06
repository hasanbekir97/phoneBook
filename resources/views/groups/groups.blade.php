@extends('layouts.general')

@section('metaSeo')
    <title>Admin Panel | Groups</title>
    <meta name="description" content="Admin Panel | Groups">
    <meta name="keywords" content='Admin Panel | Groups'>
@endsection


@section('content')

    @include('blocks.loader')

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">


            @include('blocks.header')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    @include('blocks.left-menu')

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Bootstrap tab card start -->
                                                <div class="card">
                                                    <div class="card-block">
                                                        <!-- Row start -->
                                                        <div class="row">
                                                            <div class="col-lg-12 col-xl-12">
                                                                <div class="sub-title">Groups</div>
                                                                <!-- Hover table card start -->
                                                                <div class="card productTable">
                                                                    <div class="productSpecification">
                                                                        <div class="productNumberSummary">
                                                                            <div id="totalDataNumber" class="selectLabel">
                                                                                {{$totalGroupNumber}} groups
                                                                            </div>
                                                                        </div>
                                                                        <div class="searchProductArea">
                                                                            <div class="searchLabel">
                                                                                Find:
                                                                            </div>
                                                                            <form action="{{route('group.search')}}" method="GET">
                                                                                @if(app('request')->input('search_word'))
                                                                                    <input type="text" name="search_word" id="searchGroup" class="form-control" placeholder="Search" value="{{ app('request')->input('search_word') }}">
                                                                                @else
                                                                                    <input type="text" name="search_word" id="searchGroup" class="form-control" placeholder="Search">
                                                                                @endif
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <div id="adminProducts">
                                                                        <div class="card-block table-border-style productTableDetailArea">
                                                                            <div class="table-responsive">
                                                                                <table class="table table-hover">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th>Name</th>
                                                                                        <th width="200px">Transactions</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    @foreach($groups as $group)
                                                                                        <tr>
                                                                                            <td style="vertical-align: middle">{{$group->name}}</td>
                                                                                            <td style="vertical-align: middle" class="transactionArea">
                                                                                                <div class="transactionSubArea">
                                                                                                    <a class="editButton" href="/groups/{{$group->id}}">
                                                                                                        <i class="fal fa-edit"></i> Edit
                                                                                                    </a>
                                                                                                    <button class="deleteButton" type=button onclick="deleteGroup({{$group->id}})">
                                                                                                        <i class="far fa-trash-alt"></i> Delete
                                                                                                    </button>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                                <div class="paginationLinksArea">
                                                                                    @if(app('request')->input('search_word'))
                                                                                        {!! $groups->appends(['search_word' => app('request')->input('search_word')])->links() !!}
                                                                                    @else
                                                                                        {!! $groups->links() !!}
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Hover table card end -->
                                                                </div>
                                                            </div>
                                                            <!-- Row end -->
                                                        </div>
                                                    </div>
                                                    <!-- Bootstrap tab card end -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Page body end -->
                                    </div>
                                </div>
                                <!-- Main-body end -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript" src="{{asset('assets/js/privateJs/groups.js')}}"></script>

@endsection
