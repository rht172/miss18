function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31
        && (charCode < 48 || charCode > 57))
        return false;
    return true;
}


function isNumericKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31
        && (charCode < 48 || charCode > 57))
        return true;
    return false;
}


//Notification Function
//position: 'right top'
function cznotify(titleMsg, bodyMsg, msgType = "success") {
    new Notify({
        title: titleMsg,
        text: bodyMsg,
        status: msgType,
        autotimeout: 3000
    })
}



function cznotifytimeout(titleMsg, bodyMsg, msgType = "success", time = 1500) {
    var notification = new Notify({
        title: titleMsg,
        text: bodyMsg,
        status: msgType
    });

    // Set a timeout to close the notification after 1 second (1000 milliseconds)
    setTimeout(function () {
        notification.close();
    }, time);

    console.log('success');
}

function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
};


function toggleAllCheckboxes(tableName) {
    $("#" + tableName + " input[type=checkbox]").each(function () {
        $(this).prop("checked", !$(this).prop("checked"));
    });
}


function toggleAllCheckbox() {
    $('#allcb').change(function () {
        $('tbody tr td input[type="checkbox"]').prop('checked', $(this).prop('checked'));
    });
}

function getCheckedValuesForDelete(varTableName, varModalID, varURLPath, VarTableBodyID) {

    var table = document.getElementById(varTableName);
    var checkedValues = "";
    for (var i = 0, row; row = table.rows[i]; i++) {
        var checked = row.querySelectorAll("input:checked");
        if (checked.length === 1) {
            if (i == 0) {
                checkedValues = checked[0].value;

            } else {
                checkedValues = checkedValues + "," + checked[0].value;
            }
        }
    }
    $(varModalID).modal('hide');

    $(VarTableBodyID).html(
        '<br/><br/><div ><div class="spinner-border d-flex mx-auto" role="status"><span class="sr-only">Loading...</span></div></div>'
    );
    console.log(checkedValues)
    var formData = {
        delete_key: checkedValues,
        delete_type: 'delete'
    }; //Array 

    $.ajax({
        url: varURLPath,
        type: "POST",
        data: formData,
        success: function (data, textStatus, jqXHR) {
            //data - response from server
            $(VarTableBodyID).html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {

        }
    });
}

// function to get single count value 

function getSingleValueFromDB(varURLPath, varTextBoxID) {
    var returnValue = "";
    $.ajax({
        url: varURLPath,
        type: "POST",
        data: "",
        success: function (data, textStatus, jqXHR) {
            //data - response from server
            returnValue = data
            $(varTextBoxID).val(returnValue);
        },
        error: function (jqXHR, textStatus, errorThrown) {

        }
    });

}
// function to get single count value and autogenerate iterative values
// function made by sanjeevy foe junior tapes project to generate auto generate iterative values
function getcountValueFromDB(varURLPath, varTextBoxID, variable) {

    var returnValue = 0;
    var autogenerate_string_value = "";
    var increment = 0;
    $.ajax({
        url: varURLPath,
        type: "POST",
        data: "",
        success: function (data, textStatus, jqXHR) {
            //data - response from server
            returnValue = data;
            // to return /1 if it is the statring value 
            if (returnValue == 0) {

                autogenerate_string_value = variable + '/' + 1;

                $(varTextBoxID).val(autogenerate_string_value);
            } else {

                increment = Number(returnValue) + 1;
                autogenerate_string_value = variable + '/' + increment;

                $(varTextBoxID).val(autogenerate_string_value);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {

        }
    });

}

function getMultiValueFromDB(varURLPath, varTextBoxID) {
    var returnValue = "";

    $.ajax({
        url: varURLPath,
        type: "POST",
        data: "",
        success: function (data, textStatus, jqXHR) {
            //data - response from server
            returnValue = data;
            $(varTextBoxID).text(returnValue);
            // for(var i = 0; i < returnValue.length; i++){
            //  var option =  document.createElement('option');
            //  $(option).text(returnValue[i]);
            //  $(option).val(returnValue[i]);
            // //  option.text = returnValue[i];
            // //  option.setAttribute("value",returnValue[i]);             
            //  varTextBoxID.add(option);
            //  }         


        },

        error: function (jqXHR, textStatus, errorThrown) {

        }
    });
    return returnValue
}


function isValidDate(dateString) {
    var date = new Date(dateString);
    return !isNaN(date.getTime());
}
function toDateStringForMySQL(varIDDateFeild) {

    var date = $(varIDDateFeild).val()
    console.log(date);
    try {
        var dateObj = new Date(date);
        return dateObj.toISOString().substring(0, 10);
    } catch (error) {
        return "";
    }
}


function loadTableDataFromAjax(varTableBodyID, varURLPath, formData) {
    $(varTableBodyID).html(
        '<br/><br/><div ><div class="spinner-border d-flex mx-auto" role="status"><span class="sr-only">Loading...</span></div></div>'
    );
    $.ajax({
        url: varURLPath,
        type: "POST",
        data: formData,
        success: function (data, textStatus, jqXHR) {
            //data - response from server
            $(varTableBodyID).html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {

        }
    });
}


function downloadCSV(tableId, filename) {
    var csv = [];
    var rows = document.querySelectorAll("table#" + tableId + " tr");

    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");

        for (var j = 0; j < cols.length; j++)
            row.push(cols[j].innerText);

        csv.push(row.join(","));
    }

    // Download CSV file
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv.join("\n")], { type: "text/csv" });

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}



function downloadPDF(tableId, filename) {
    var pdf = new jsPDF('p', 'pt', 'letter');
    var source = document.getElementById(tableId).innerHTML;

    // We'll make our own renderer to skip this editor
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    margins = {
        top: 50,
        bottom: 60,
        left: 40,
        width: 522
    };
    pdf.fromHTML(
        source,
        margins.left,
        margins.top, {
        'width': margins.width,
        'elementHandlers': specialElementHandlers
    },

        function (dispose) {
            pdf.save(filename);
        }, margins);
}

function hideDatePicker(checkBoxID, datePickerDivID) {
    div2 = document.getElementById(datePickerDivID);
    if (document.getElementById(checkBoxID).checked) {
        div2.setAttribute("style", "display: block;");
    } else {
        div2.setAttribute("style", "display: none;");
    }
}





function getMySQLDateFromDatePicker(typeFromOrTo, datePickerString) {
    var returnDate = '';
    // Remove The Extra Space
    datePickerString = datePickerString.replace(" ", "");
    // Slipt The Two dates Based on the Key Word to

    var datePickerValue = datePickerString.split("to");
    // Get The Value Of From Or To Date
    if (typeFromOrTo == "from") {
        returnDate = datePickerValue[0];

    }
    else {
        returnDate = datePickerValue[1];
    }

    var dateParts = returnDate.split("-");
    var dateResult = dateParts[2] + "-" + dateParts[1] + '-' + dateParts[0]

    return dateResult.replace(" ", "");;

}


function downloadExcel(varTableID, excelFileName) {
    // Get the table element
    var table = document.getElementById(varTableID);
    // Create an empty Excel workbook
    var wb = XLSX.utils.table_to_book(table);
    // Get the binary data of the workbook
    var wbout = XLSX.write(wb, { bookType: 'xlsx', bookSST: true, type: 'binary' });
    // Create a Blob with the binary data
    var blob = new Blob([s2ab(wbout)], { type: "application/octet-stream" });
    // Create a link element to trigger the download
    var link = document.createElement("a");
    link.href = window.URL.createObjectURL(blob);
    link.download = excelFileName + ".xlsx";
    link.click();
}

function s2ab(s) {
    var buf = new ArrayBuffer(s.length);
    var view = new Uint8Array(buf);
    for (var i = 0; i != s.length; ++i) view[i] = s.charCodeAt(i) & 0xFF;
    return buf;
}





function showToastSuccess(title, message, timestamp) {
    // Create a div element for the toast
    var toastDiv = document.createElement("div");
    toastDiv.className = "toast position-fixed top-1 end-0"; // Positioning the toast
    toastDiv.setAttribute("role", "alert");
    toastDiv.setAttribute("aria-live", "assertive");
    toastDiv.setAttribute("aria-atomic", "true");
    toastDiv.style.zIndex = "9999"; // Set z-index to ensure it appears above other content

    // Construct the inner HTML content
    toastDiv.innerHTML = `
        <div class="toast-header text-white" style="background-color:#F7878F">
            <i class="ci-check-circle me-2"></i>
            <span class="fw-medium me-auto">${title}</span>
            <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" style="color:#F7878F">${message}</div>
    `;

    // Append the toast to the body
    document.body.appendChild(toastDiv);

    // Use Bootstrap's Toast class to initialize the toast
    var toast = new bootstrap.Toast(toastDiv);

    // Show the toast
    toast.show();

    // Set a timeout to remove the toast after 2 seconds
    setTimeout(function () {
        toastDiv.remove();
    }, 3000);
}




function showToastWarning(title, message, timestamp) {
    // Create a div element for the toast
    var toastDiv = document.createElement("div");
    toastDiv.className = "toast position-fixed top-0 end-0"; // Positioning the toast
    toastDiv.setAttribute("role", "alert");
    toastDiv.setAttribute("aria-live", "assertive");
    toastDiv.setAttribute("aria-atomic", "true");
    toastDiv.style.zIndex = "9999"; // Set z-index to ensure it appears above other content

    // Construct the inner HTML content
    toastDiv.innerHTML = `
        <div class="toast-header bg-warning text-white">
            <i class="ci-security-announcement me-2"></i>
            <span class="fw-medium me-auto">${title}</span>
            <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-warning">${message}</div>
    `;

    // Append the toast to the body
    document.body.appendChild(toastDiv);

    // Use Bootstrap's Toast class to initialize the toast
    var toast = new bootstrap.Toast(toastDiv);

    // Show the toast
    toast.show();

    // Set a timeout to remove the toast after 2 seconds
    setTimeout(function () {
        toastDiv.remove();
    }, 2000);
}





function showToastDanger(title, message, timestamp) {
    // Create a div element for the toast
    var toastDiv = document.createElement("div");
    toastDiv.className = "toast position-fixed top-0 end-0"; // Positioning the toast
    toastDiv.setAttribute("role", "alert");
    toastDiv.setAttribute("aria-live", "assertive");
    toastDiv.setAttribute("aria-atomic", "true");
    toastDiv.style.zIndex = "9999"; // Set z-index to ensure it appears above other content

    // Construct the inner HTML content
    toastDiv.innerHTML = `
        <div class="toast-header bg-danger text-white">
            <i class="ci-close-circle me-2"></i>
            <span class="fw-medium me-auto">${title}</span>
            <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-danger">${message}</div>
    `;

    // Append the toast to the body
    document.body.appendChild(toastDiv);

    // Use Bootstrap's Toast class to initialize the toast
    var toast = new bootstrap.Toast(toastDiv);

    // Show the toast
    toast.show();

    // Set a timeout to remove the toast after 2 seconds
    setTimeout(function () {
        toastDiv.remove();
    }, 2000);
}






function showToastAccent(title, message, timestamp) {
    // Create a div element for the toast
    var toastDiv = document.createElement("div");
    toastDiv.className = "toast position-fixed top-0 end-0"; // Positioning the toast
    toastDiv.setAttribute("role", "alert");
    toastDiv.setAttribute("aria-live", "assertive");
    toastDiv.setAttribute("aria-atomic", "true");
    toastDiv.style.zIndex = "9999"; // Set z-index to ensure it appears above other content

    // Construct the inner HTML content
    toastDiv.innerHTML = `
        <div class="toast-header bg-accent text-white">
            <i class="ci-unlocked me-2"></i>
            <span class="fw-medium me-auto">${title}</span>
            <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-accent">${message}</div>
    `;

    // Append the toast to the body
    document.body.appendChild(toastDiv);

    // Use Bootstrap's Toast class to initialize the toast
    var toast = new bootstrap.Toast(toastDiv);

    // Show the toast
    toast.show();

    // Set a timeout to remove the toast after 2 seconds
    setTimeout(function () {
        toastDiv.remove();
    }, 2000);
}




function showToastInfo(title, message, timestamp) {
    // Create a div element for the toast
    var toastDiv = document.createElement("div");
    toastDiv.className = "toast position-fixed top-0 end-0"; // Positioning the toast
    toastDiv.setAttribute("role", "alert");
    toastDiv.setAttribute("aria-live", "assertive");
    toastDiv.setAttribute("aria-atomic", "true");
    toastDiv.style.zIndex = "9999"; // Set z-index to ensure it appears above other content

    // Construct the inner HTML content
    toastDiv.innerHTML = `
        <div class="toast-header bg-info text-white">
            <i class="ci-announcement me-2"></i>
            <span class="fw-medium me-auto">${title}</span>
            <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-info">${message}</div>
    `;

    // Append the toast to the body
    document.body.appendChild(toastDiv);

    // Use Bootstrap's Toast class to initialize the toast
    var toast = new bootstrap.Toast(toastDiv);

    // Show the toast
    toast.show();

    // Set a timeout to remove the toast after 2 seconds
    setTimeout(function () {
        toastDiv.remove();
    }, 2000);
}



var scroll = window.requestAnimationFrame ||
    // IE Fallback
    function (callback) { window.setTimeout(callback, 1000 / 60) };
var elementsToShow = document.querySelectorAll('.show-on-scroll');

function loop() {

    Array.prototype.forEach.call(elementsToShow, function (element) {
        if (isElementInViewport(element)) {
            element.classList.add('is-visible');
        } else {
            element.classList.remove('is-visible');
        }
    });

    scroll(loop);
}

// Call the loop for the first time
loop();

// Helper function from: http://stackoverflow.com/a/7557433/274826
function isElementInViewport(el) {
    // special bonus for those using jQuery
    if (typeof jQuery === "function" && el instanceof jQuery) {
        el = el[0];
    }
    var rect = el.getBoundingClientRect();
    return (
        (rect.top <= 0
            && rect.bottom >= 0)
        ||
        (rect.bottom >= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.top <= (window.innerHeight || document.documentElement.clientHeight))
        ||
        (rect.top >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight))
    );
}



// $(document).ready(function () {

//     var additionalImagesContainer = document.querySelector('.additional-images-container');
//     additionalImagesContainer.style.display = 'none';

// });

