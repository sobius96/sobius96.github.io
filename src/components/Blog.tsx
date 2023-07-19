type Blogprops = {
    date: string
    children: string
}

export const Blog = (props: Blogprops) => {
    return (
        <div className="Blog">
            <div className="Date">
                published: {props.date}
            </div>
            <hr />
            {props.children}
        </div>
    )
}