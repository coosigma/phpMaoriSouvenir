<?php
/**
 * Created by PhpStorm.
 * User: Coos
 * Date: 2018/11/2
 * Time: 13:07
 */
?>

@extends('Shared._layout')
@section('title', 'Home Page')
@section('content')
    <h2>Index</h2>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" style="position:relative;top:0px">
                <ul class="nav navbar-left">
                    <li class="nav-header" style="font-size:22px;padding:20px 20px 20px 20px">
                        Category
                    </li>
                    <li><hr /></li>
                    <li>
                        {{--@Html.ActionLink("Maroi Gifts", "Index", new { category = "MaoriGift" })--}}
                    </li>
                    <li>
                        {{--@Html.ActionLink("Jewels", "Index", new { category = "Jewel" })--}}
                    </li>
                    <li>
                        {{--@Html.ActionLink("Crafts", "Index", new { category = "Craft" })--}}
                    </li>
                    <li>
                        {{--@Html.ActionLink("Arts", "Index", new { category = "Art" })--}}
                    </li>
                    <li>
                        {{--@Html.ActionLink("Foods", "Index", new { category = "Food" })--}}
                    </li>
                    <li class="active">
                        {{--@Html.ActionLink("All Categories", "Index", new { category = "AllCategories" })--}}
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <p>
                    <a asp-action="Create">Create New</a>
                </p>
                @php ($paras = Request::except('search_str'))
                <form action="{{ action('SouvenirController@index', $paras) }}" method="get">
                    <div class="form-actions no-color">
                        <p>
                            Find by name: <input type="text" name="search_str" value="{{app('request')->input('search_str')}}" />
                            <input type="submit" value="Search" class="btn btn-default" /> |
                            <a href='{{ route('souvenir@index') }}'>Back to Full List</a>
                        </p>
                        <p>
                            Price range: <input type="text" name="lower_price" value="{{app('request')->input('lower_price')}}" onkeyup="value=value.replace(/[^\d.]/g,'')"/>
                            - <input type="text" name="upper_price" value="{{app('request')->input('upper_price')}}" onkeyup="value=value.replace(/[^\d.]/g,'')"/>
                            <input type="submit" value="Filter this Price Range" class="btn btn-default" />
                        </p>
                    </div>
                </form>
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            Image
                        </th>
                        <th>
                            SouvenirID
                        </th>
                        <th>
                            @if (app('request')->input('sort_mode') == 'name')
                                @php ($sort_name = 'name_desc')
                            @else
                                @php ($sort_name = 'name')
                            @endif
                            @php ($paras = Request::except('sort_mode'))
                            @php ($paras['sort_mode'] = $sort_name)
                            <a href='{{ route('souvenir@index', $paras) }}'>Name</a>
                        </th>
                        <th>
                            @if (app('request')->input('sort_mode') == 'price')
                                @php ($sort_price = 'price_desc')
                            @else
                                @php ($sort_price = 'price')
                            @endif
                            @php ($paras = Request::except('sort_mode'))
                            @php ($paras['sort_mode'] = $sort_price)
                            <a href='{{ route('souvenir@index', $paras) }}'>Price</a>
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Category
                        </th>
                        <th>
                            Supplier
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--Here we need a model to view data in the database--}}
                    @foreach($souvenirs as $souvenir)
                        <tr>
                            <td>
                                <img style="width: 250px; height: auto;" src="{{$souvenir->PhotoPath}}" alt="Souvenir Image" onerror="this.onerror = null; this.src = '{{$err_photo}}'">
                            </td>
                            <td>
                                {{$souvenir->id}}
                            </td>
                            <td>
                                {{$souvenir->Name}}
                            </td>
                            <td>
                                {{$souvenir->Price}}
                            </td>
                            <td>
                                {{$souvenir->Description}}
                            </td>
                            <td>
                                {{$souvenir->CategoryID}}
                            </td>
                            <td>
                                {{$souvenir->SupplierID}}
                            </td>
                            <td>
                                <a asp-action="Edit" asp-route-id="@item.SouvenirID">Edit</a> |
                                <a asp-action="Details" asp-route-id="@item.SouvenirID">Details</a> |
                                <a asp-action="Delete" asp-route-id="@item.SouvenirID">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    {{ $souvenirs->appends(Request::except('page'))->links() }}
                    {{--<tbody>
                    @foreach (var item in Model)
                        {
                        var imgUrl = @Href("~" + item.PhotoPath);
                        var errImg = @Href("~/images/Error.svg");
                        <tr>
                            <td>
                                <img style="width: 250px; height: auto;" src="@imgUrl" alt="Souvenir Image" onerror="this.onerror = null; this.src = '@errImg'">
                            </td>
                            <td>
                                @Html.DisplayFor(modelItem => item.SouvenirID)
                            </td>
                            <td>
                                @Html.DisplayFor(modelItem => item.SouvenirName)
                            </td>
                            <td>
                                @Html.DisplayFor(modelItem => item.Price)
                            </td>
                            <td>
                                @Html.DisplayFor(modelItem => item.Description)
                            </td>
                            <td>
                                @Html.DisplayFor(modelItem => item.Category.CategoryName)
                            </td>
                            <td>
                                @Html.DisplayFor(modelItem => item.Supplier.FullName)
                            </td>
                            <td>
                                <a asp-action="Edit" asp-route-id="@item.SouvenirID">Edit</a> |
                                <a asp-action="Details" asp-route-id="@item.SouvenirID">Details</a> |
                                <a asp-action="Delete" asp-route-id="@item.SouvenirID">Delete</a>
                            </td>
                        </tr>
                        }
                    </tbody>--}}
                </table>
                {{--                @{
                                var prevDisabled = !Model.HasPreviousPage ? "disabled" : "";
                                var nextDisabled = !Model.HasNextPage ? "disabled" : "";
                                }

                                <a asp-action="Index"
                                   asp-route-sortOrder="@ViewData["CurrentSort"]"
                                asp-route-page="@(Model.PageIndex - 1)"
                                asp-route-currentFilter="@ViewData["CurrentFilter"]"
                                asp-route-lower_price="@ViewData["lowerPrice"]"
                                asp-route-upper_price="@ViewData["upperPrice"]"
                                class="btn btn-default @prevDisabled">
                                Previous
                                </a>
                                <a asp-action="Index"
                                   asp-route-sortOrder="@ViewData["CurrentSort"]"
                                asp-route-page="@(Model.PageIndex + 1)"
                                asp-route-currentFilter="@ViewData["CurrentFilter"]"
                                asp-route-lower_price="@ViewData["lowerPrice"]"
                                asp-route-upper_price="@ViewData["upperPrice"]"
                                class="btn btn-default @nextDisabled">
                                Next
                                </a>--}}
            </div>
        </div>
    </div>

@endsection
