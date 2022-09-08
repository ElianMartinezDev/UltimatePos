<!-- Edit Order tax Modal -->
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">@lang('lang_v1.suspended_sales')</h4>
            <input autofocus class="form-control ml-3 mr-3" id="myInput" type="text" placeholder="Buscar..">
        </div>
        <div class="modal-body">
            <div class="container-fluid">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><i class="fa fa-edit"></i> Nota</th>
                            <th>No.#</th>
                            <th><i class="fa fa-calendar"></i> Fecha / Hora</th>
                            <th><i class="fa fa-user"></i> Cliente</th>
                            <th><i class="fa fa-cubes"></i> Total artículos</th>
                            <th><i class="fas fa-money-bill-alt"></i> Total</th>
                            <th> Operaciones</th>

                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @php
                        $c = 0;
                        $subtype = '';
                        @endphp
                        @if(!empty($transaction_sub_type))
                        @php
                        $subtype = '?sub_type='.$transaction_sub_type;
                        @endphp
                        @endif
                        @forelse($sales as $sale)
                        @if($sale->is_suspend)
                        <!-- <div class="col-xs-6 col-sm-3">
                            <div class="small-box bg-yellow">
                                <div class="inner text-center">
                                    @if(!empty($sale->additional_notes))
                                    <p><i class="fa fa-edit"></i> {{$sale->additional_notes}}</p>
                                    @endif
                                    <p>{{$sale->invoice_no}}<br>
                                        {{@format_date($sale->transaction_date)}}<br>
                                        <strong><i class="fa fa-user"></i> {{$sale->name}}</strong>
                                    </p>
                                    <p><i class="fa fa-cubes"></i>@lang('lang_v1.total_items'):
                                        {{count($sale->sell_lines)}}<br>
                                        <i class="fas fa-money-bill-alt"></i> @lang('sale.total'): <span
                                            class="display_currency"
                                            data-currency_symbol=true>{{$sale->final_total}}</span>
                                    </p>
                                    @if($is_tables_enabled && !empty($sale->table->name))
                                    @lang('restaurant.table'): {{$sale->table->name}}
                                    @endif
                                    @if($is_service_staff_enabled && !empty($sale->service_staff))
                                    <br>@lang('restaurant.service_staff'): {{$sale->service_staff->user_full_name}}
                                    @endif
                                </div>
                                <a href="{{action('SellPosController@edit', ['id' => $sale->id]).$subtype}}"
                                    class="small-box-footer bg-blue p-10">
                                    @lang('sale.edit_sale') <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                <a href="{{action('SellPosController@destroy', ['id' => $sale->id])}}"
                                    class="small-box-footer delete-sale bg-red is_suspended">
                                    @lang('messages.delete') <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div> -->

                        <tr>
                            <td>
                                @if(!empty($sale->additional_notes))
                                {{$sale->additional_notes}}
                                @endif
                            </td>
                            <td>{{$sale->invoice_no}}</td>
                            <td>{{@format_date($sale->transaction_date)}}</td>
                            <td>{{$sale->name}}</td>
                            <td>{{count($sale->sell_lines)}}</td>
                            <td>{{$sale->final_total}}</td>
                            @if($is_tables_enabled && !empty($sale->table->name))
                            <td>
                                @lang('restaurant.table'): {{$sale->table->name}}
                            </td>@endif
                            @if($is_service_staff_enabled && !empty($sale->service_staff))
                            <td>
                                @lang('restaurant.service_staff'): {{$sale->service_staff->user_full_name}}
                            </td> @endif
                            <td>
                                <a href="{{action('SellPosController@edit', ['id' => $sale->id]).$subtype}}">
                                    @lang('sale.edit_sale') <i class="fa fa-arrow-circle-right"></i>
                                </a>
                                <a href="{{action('SellPosController@destroy', ['id' => $sale->id])}}"
                                    class="delete-sale bg-red is_suspended">
                                    @lang('messages.delete') <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @php
                        $c++;
                        @endphp
                        @endif
                        @if($c%4==0)
                        <div class="clearfix"></div>
                        @endif
                        @empty
                        <p class="text-center">@lang('purchase.no_records_found')</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.close')</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<script>
$(document).ready(function() {
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>