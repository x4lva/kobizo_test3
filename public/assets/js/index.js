loadFeed(window.location.href.split("#")[1]==undefined ? "Habrahab" : window.location.href.split("#")[1]);


function strip_html_tags(str) {
    if ((str === null) || (str === ''))
        return false;
    else
        str = str.toString();
    return str.replace(/<[^>]*>/g, '');
}

// Function for making request to server (We cannot access another domain in java-script queries)
function makeRequest(url) {
    $.ajax(
        '/api/getrss/' + url, {
            accepts: {
                xml: "application/rss+xml"
            },
            dataType: "xml",
            success: function (data) {
                 $(data)
                    .find("item")
                    .each(function () {
                        const el = $(this);
                        const template = `
                      <a onclick="postRedirect('${el.find("guid").text()}')" target="_blank" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">${el.find("title").text()}</h5>
                            <small>${el.find("updated").text()}</small>
                        </div>
                        <p class="mb-1">${strip_html_tags(el.find("description").text()).slice(0, 350) + '...'}</p>
                        <div>
                            <span class="badge rounded-pill bg-primary"></span>
                        </div>
                      </a> `;
                        $("#rss-container .list-group").append(template);
                    });

                $("#loader").toggleClass("d-none");
            }
        });

}

// Function for onclick attribute
function loadFeed(from) {

    $("#rss-container .list-group").empty();
    $("#loader").toggleClass("d-none");
    $("#header").text(from.replace("%20", " "));

    makeRequest(from);

}

// Modal window init
function postRedirect(url) {
    const myModal = new bootstrap.Modal(document.getElementById('myModal'));
    $(".modal-body a").attr("href", url);
    myModal.show()
}

