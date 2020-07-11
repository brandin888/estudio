(function() {
    const search = instantsearch({
        appId: 'NA92TFGK37',
        apiKey: '349437d5bdbf73a16448a17cc07df8c3',
        indexName: 'products',
        urlSync: true
    });

    search.addWidget(
        instantsearch.widgets.hits({
            container: '#hits',
            templates: {
                empty: 'Productos no encontrados',
                item: function(item) {
                    return `
                        <a style="color:#212121;" href="${window.location.origin}/shop/${item.slug}">
                            <div class="instantsearch-result">
                                <div>
                                    <img src="${window.location.origin}/storage/${item.image}" alt="img" class="algolia-thumb-result">
                                </div>
                                <div>
                                    <div class="result-title">
                                        ${item._highlightResult.name.value}
                                    </div>
                                    <div class="result-details">
                                        ${item._highlightResult.details.value}
                                    </div>
                                    <div class="result-price">
                                        S/${(item.price / 100).toFixed(2)}
                                    </div>
                                </div>
                            </div>
                        </a>
                        <hr>
                    `;
                }
            }
        })
    );

    // initialize SearchBox
    search.addWidget(
        instantsearch.widgets.searchBox({
            container: '#search-box',
            placeholder: 'Buscar productos'
        })
    );

    // initialize pagination
    search.addWidget(
        instantsearch.widgets.pagination({
            container: '#pagination',
            maxPages: 20,
            // default is to scroll to 'body', here we disable this behavior
            scrollTo: false
        })
    );

    search.addWidget(
        instantsearch.widgets.stats({
            container: '#stats-container'
        })
    );

    // initialize RefinementList
    search.addWidget(
        instantsearch.widgets.refinementList({
            container: '#refinement-list',
            attributeName: 'categories',
            sortBy: ['name:asc']
        })
    );

    search.start();
})();
