$(document).ready(function() {
    countOnCart('#ticketOnCartDashboard');
    countUnpaidInvoice('#totalUnpaidInvoice');
    countWaitingInvoice('#totalWaitingInvoice');
    countPaidInvoice('#totalPaidInvoice');
    countBoughtTicket('#totalBoughtTicket');
    getBoughtTicket();
})




function buyTicket() {
    $('#selectLocationModal').modal('show');
}

function buyEdelweissTicket() {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/GetCategories',
        data: {
            location: 'Edelweiss Grand Ballroom',
        },
        dataType: 'json',
        success: function(data) {
            $('#edelweissTickets').empty()
            $.each(data, function(index, value) {
                $('#edelweissTickets').append(
                    `
                    <div class="col-lg-12 col-md-12 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold text-primary text-uppercase mb-1">
                                                ` + value.nama + `
                                            </div>
                                            <hr>
                                            <div><strong>` + value.tanggal + `</strong></div>
                                            <div>` + value.start + ` - ` + value.end + `</div>
                                            <div class="mt-2 mb-2">` + value.location + `</div>
                                            <div class="form-group">
                                                <label for=""><strong>Pilih Jenis Tiket</strong></label>
                                                <select class="form-control" name="" id="subCategory` + value.id + `">
                                                </select>
                                            </div>
                                            <button class=" btn btn-primary" onclick='addToCart(` + value.id + `)'> <i class="fa fa-cart-plus"></i> Tambahkan ke keranjang</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `
                )
            })
        }
    })
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/GetSubCategories',
        dataType: 'json',
        success: function(data) {
            $.each(data, function(index, value) {
                $('#subCategory' + value.id_ticket_category).append(
                    `
                    <option value=` + value.id + `>` + value.nama + ` Harga Rp` + value.harga + `</option>
                    `
                )
            })
        }
    })
    countOnCart('#ticketOnCart');

    $('.modal').modal('hide');
    setTimeout(function() {
        $('#buyTicketEdelweissModal').modal('show');
    }, 200);
}

function buyKcmTicket(selected_seat) {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/GetCategories',
        data: {
            location: 'Kota Cinema Mall Jember',
        },
        dataType: 'json',
        success: function(data) {
            $('#kcmTickets').empty()
            let selectedSeat = selected_seat ? selected_seat : '';
            $.each(data, function(index, value) {
                $('#kcmTickets').append(
                    `
                    <div class="col-lg-12 col-md-12 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold text-primary text-uppercase mb-1">
                                                ` + value.nama + `
                                            </div>
                                            <hr>
                                            <div><strong>` + value.tanggal + `</strong></div>
                                            <div>` + value.start + ` - ` + value.end + `</div>
                                            <div class="mt-2 mb-2">` + value.location + `</div>
                                            <div class="mt-2 mb-2">Seat : ` + selectedSeat + ` <button class="btn btn-primary" onclick="seatSelector(` + selected_seat + `)">Pilih Seat</button></div>
                                            <div class="form-group">
                                                <label for=""><strong>Pilih Jenis Tiket</strong></label>
                                                <select class="form-control" name="" id="subCategory` + value.id + `">
                                                </select>
                                            </div>
                                            <button class=" btn btn-primary" onclick='addToCart(` + value.id + `, ` + selectedSeat + `)'> <i class="fa fa-cart-plus"></i> Tambahkan ke keranjang</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `
                )
            })
        }
    })
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/GetSubCategories',
        dataType: 'json',
        success: function(data) {
            $.each(data, function(index, value) {
                $('#subCategory' + value.id_ticket_category).append(
                    `
                    <option value=` + value.id + `>` + value.nama + ` Harga Rp` + value.harga + `</option>
                    `
                )
            })
        }
    })
    countOnCart('#ticketOnCart');

    $('.modal').modal('hide');
    setTimeout(function() {
        $('#buyTicketKcmModal').modal('show');
    }, 200);
}


function addToCart(idCategory, id_seat) {
    let selectedTicket = $('#subCategory' + idCategory + ' option:selected').val();
    let nama = $('#namaPemesan').val();
    let email = $('#emailPemesan').val();
    let nomorHp = $('#nomorHpPemesan').val();

    // if (nama && email && nomorHp) {
    //     $.ajax({
    //         type: 'post',
    //         url: '/Ticketing/Penonton/Ticket/AddToCart',
    //         data: {
    //             selectedTicket: selectedTicket,
    //             nama: nama,
    //             email: email,
    //             nomorHp: nomorHp,
    //             id_seat: id_seat,
    //         },
    //         dataType: 'json',
    //         success: function(data) {
    //             $('#buyTicketModal').modal('hide');
    //             // buyTicket();
    //             setTimeout(function() {
    //                 buyTicket();
    //                 countOnCart('#ticketOnCartDashboard');
    //                 alert('Berhasil menambahkan ke keranjang.');
    //             }, 500)

    //         },
    //     })
    // } else {
    //     alert('Harap lengkapi biodata pemilik ticket')
    // }
}

function countOnCart(where) {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/CountOnCart',
        dataType: 'json',
        success: function(data) {
            $(where).text(data);
        },
    })
}

function openCart() {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/GetCart',
        dataType: 'json',
        success: function(data) {
            // total price on cart
            let total = 0;
            $('#ticketsOnCart').empty();
            $.each(data, function(index, value) {
                total += parseInt(value.harga);
                $('#ticketsOnCart').append(
                    `
                    <div class="col-lg-12 col-md-12 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                               <div class="font-weight-bold text-primary text-uppercase mb-1">
                                   ` + value.nama_category + ` <span>` + value.nama_sub_category + `
                               </div>
                               <hr>
                               <div class="row no-gutters align-items-start">
                                    <div class="col mr-2">
                                        <div><strong>` + value.tanggal + `</strong></div>
                                        <div>` + value.start + ` - ` + value.end + `</div>
                                        <div class="mt-2 mb-2">` + value.location + `</div>
                                    </div>
                                    <div class ="col">
                                        <div><strong>` + value.nama + `</strong></div>
                                        <div>` + value.email + `</div>
                                        <div>` + value.no_hp + `</div>
                                        <div class="h4 text-primary mt-2"> Rp ` + value.harga + `</div>
                                    </div>
                                </div>
                                <button class=" btn btn-primary " onclick='deleteCart(` + value.id + `)'> <i class="fa fa-trash"></i> Hapus</button>
                            </div>
                        </div>
                    </div>
                    `
                )
            })

            $('#checkOutButton').html(`<button class="btn btn-primary" onclick="checkOut(` + total + `)"><i class="fa fa-shopping-cart"></i> Check Out</button>`)
            $('#priceOnCart').text(total);

        },
    })
    $('.modal').modal('hide');
    $('#cartModal').modal('show');
}

function deleteCart(id) {
    $.ajax({
        type: 'post',
        url: '/Ticketing/Penonton/Ticket/DeleteCart',
        data: {
            id_cart: id,
        },
        dataType: 'json',
        success: function(data) {
            $('#cartModal').modal('hide');
            setTimeout(function() {
                alert('Berhasil menghapus item');
                countOnCart('#ticketOnCartDashboard');
                openCart();
            }, 500);

        }
    })
}

function checkOut(total) {
    $.ajax({
        type: 'post',
        url: '/Ticketing/Penonton/Ticket/CheckOut',
        data: {
            total: total,
        },
        dataType: 'json',
        success: function(data) {
            countOnCart('#ticketOnCartDashboard');
            openInvoiceDetail(data);
        }
    })
}

function countUnpaidInvoice(where) {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/CountInvoice',
        data: {
            status: 'unpaid',
        },
        dataType: 'json',
        success: function(data) {
            $(where).text(data);
        },
    })
}

function countWaitingInvoice(where) {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/CountInvoice',
        data: {
            status: 'waiting',
        },
        dataType: 'json',
        success: function(data) {
            $(where).text(data);
        },
    })
}

function countPaidInvoice(where) {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/CountInvoice',
        data: {
            status: 'paid',
        },
        dataType: 'json',
        success: function(data) {
            $(where).text(data);
        },
    })
}

function openInvoice() {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/GetInvoice',
        dataType: 'json',
        success: function(data) {
            $('#invoiceTableData').empty()
            $.each(data, function(index, value) {
                let status;
                if (value.status == 'unpaid') {
                    status = `<p class="text-danger">Unpaid <i class="fa fa-times"></i></p>`
                } else if (value.status == 'waiting') {
                    status = `<p class="text-info">Waiting <i class="fa fa-history"></i></p>`
                } else if (value.status == 'verified') {
                    status = `<p class="text-success">Verified <i class="fa fa-check"></i></p>`
                }
                $('#invoiceTableData').append(
                    `
                <tr>
                    <td>` + value.id + `</td>
                    <td>` + value.created_at + `</td>
                    <td>` + value.username + `</td>
                    <td>Rp ` + value.total + `</td>
                    <td>
                        ` + status + `
                    </td>
                    <td><button class="btn btn-primary" onclick="openInvoiceDetail(` + value.id + `)">Detail</button></td>
                </tr>
                `
                )
            })
        }
    })
    $('#invoiceModal').modal('show');
}

function openInvoiceDetail(id_invoice) {
    $.ajax({
        type: 'post',
        url: '/Ticketing/Penonton/Ticket/GetInvoiceDetail',
        data: {
            id_invoice: id_invoice,
        },
        dataType: 'json',
        success: function(data) {
            $('#ticket_bought_invoice').empty();
            $('#id_invoice').text(data.invoice.id);
            $('#username_invoice').text(data.invoice.username);
            $('#tanggal_invoice').text(data.invoice.created_at);

            $.each(data.detail, function(index, value) {
                $('#ticket_bought_invoice').append(
                    `
                    <div class="row justify-content-between">
                    <div class="col">
                    <div>
                    ` + value.nama_pemilik + `
                    </div>
                    <div class="row">
                        <div class="col">
                        ` + value.nama_category + ` - ` + value.nama + `
                        </div>
                    </div>
                </div>
                        <div class="col">Rp ` + value.harga + `</div>
                    </div>
                    `
                );
            })

            $('#totalPriceInvoice').text('Rp ' + data.invoice.total);
        }
    })

    $('.modal').modal('hide');
    $('#invoiceDetailModal').modal('show');
}

function uploadPembayaran() {
    let id_invoice = $('#id_invoice').text();
    $('#invoiceId').val(id_invoice);
    $('.modal').modal('hide');
    $('#uploadPembayaranModal').modal('show');
}

function detailTicket(id_ticket_bought) {
    $('.modal').modal('hide');

    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/GetBoughtTicketDetail',
        data: {
            id_ticket_bought: id_ticket_bought,
        },
        dataType: 'json',
        success: function(data) {
            console.log(data);
            $('#ticketBoughtDetail').html(
                `
                <div class="col-lg-12 col-md-12 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                               <div class="font-weight-bold text-primary text-uppercase mb-1">
                                   ` + data.nama_category + ` <span>` + data.nama_sub_category + `
                               </div>
                               <hr>
                               <div class="row no-gutters align-items-start">
                                    <div class="col mr-2">
                                        <div><strong>` + data.tanggal + `</strong></div>
                                        <div>` + data.start + ` - ` + data.end + `</div>
                                        <div class="mt-2 mb-2">` + data.location + `</div>
                                    </div>
                                    <div class ="col">
                                        <div><strong>` + data.nama + `</strong></div>
                                        <div>` + data.email + `</div>
                                        <div>` + data.no_hp + `</div>
                                        <div class="mt-2"><img src="` + data.bar_code + `"></div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="button" data-dismiss="modal" aria-label="Close">Tutup</button>
                            </div>
                        </div>
                    </div>
                `
            );
        }
    })

    $('#ticketDetailModal').modal('show');
}

function getBoughtTicket() {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/GetBoughtTicket',
        dataType: 'json',
        success: function(data) {
            $('#myTicket').empty();
            $.each(data, function(index, value) {
                $('#myTicket').append(
                    `
                    <div class="col-xl-5 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-primary text-uppercase mb-1">
                                            ` + value.nama_category + ` <p>` + value.nama_sub_category + `</p>
                                        </div>
                                        <hr>
                                        <div class="mb-0 font-weight-bold text-gray-800">` + value.nama + `</div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                Email : <div class="text-success font-weight-bold">` + value.email + `</div>
                                            </div>
                                            <div class="col">
                                                No. HP : <div class="text-danger font-weight-bold">` + value.no_hp + `</div>
                                            </div>
                                        </div>
                                        <button class=" btn btn-primary" onclick='detailTicket(` + value.id + `)'>Lihat</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                );
            })
        }
    })
}

function countBoughtTicket(where) {
    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/CountBoughtTicket',
        dataType: 'json',
        success: function(data) {
            $(where).text(data);
        }
    })
}

// the fucking seat selector

function seatSelector(selected_id) {
    $('.modal').modal('hide');

    $.ajax({
        type: 'get',
        url: '/Ticketing/Penonton/Ticket/GetSeat',
        data: {
            id_studio: 1
        },
        dataType: "json",
        success: function(data) {
            $('#seat').empty()
            $.each(data, function(index, value) {
                let namaSeat = value.nama;
                let seatNumber = namaSeat.replace(/^\D+/g, '');
                let seatStatus = (value.seat_status == 'booked') ? "btn-secondary" : "";
                let jalan = (seatNumber == 7) ? 'style="margin-right: 100px"' : '';
                let selectedSeat = (selected_id == value.id) ? 'btn-success' : '';
                $('#seat').append(
                    `<div class="col" ` + jalan + `><button onclick="selectSeat(` + value.id + `)" id="seat` + value.id + `" class="seat-primary btn ` + seatStatus + ` btn-sm seat ` + selectedSeat + `" style="width: 50px">` + value.nama + `</button></div>`

                )
            })
        }
    })

    $('#seatSelectorModal').modal('show');
}

function selectSeat(id) {
    $('.seat').removeClass('btn-success');
    $('#seat' + id).addClass('btn-success');
    $('#saveSeat').html(`<button class="btn btn-success" type="button" onclick="buyKcmTicket(` + id + `)">Ok</button>`)
}