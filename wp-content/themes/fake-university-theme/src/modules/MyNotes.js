import $ from "jquery"
class MyNotes {
    constructor() {
        this.events()
    }

    events() {
        $(".delete-note").on("click", this.deleteNote)
    }

    deleteNote() {
        $.ajax({
            beforeSend: (xhr) => {
                xhr.setRequestHeader('X-WP-Nonce', siteData.nonce)
            },
            url: siteData.root_url + '/wp-json/wp/v2/note/76',
            method: 'DELETE',
            success: (response) => {
                console.log("DELETED")
                console.log(response)
            },
            error: (response) => {
                console.log("ERROR")
                console.log(response)
            }
        })
    }
}

export default MyNotes