class Fetch{
  
    fetchdata(url)
    {
        axios.get(url)
        .then((response) => {
            console.log (response.data.data),
            this.makepagination(response.data.meta, response.data.links)
        });
    }

    makepagination(meta, links)
    {
        let pagination = {
            current_page : meta.current_page,
            last_page_url : meta.last_page,
            next_page_url : links.next,
            prev_page_url : links.prev
        }

        this. pagination =  pagination;
    }
    senddata()
    {
        return this.data;
    }
}