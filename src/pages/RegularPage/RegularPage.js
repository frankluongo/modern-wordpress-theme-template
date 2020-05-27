import React, { useEffect, useState } from "react";
import { dataService } from "../../services/dataService";
import { createMarkup } from "../../utils";

const RegularPage = (props) => {
  const [pageData, setPageData] = useState({
    content: {
      rendered: "",
    },
  });
  const slug = props.match.params.slug;
  const url = `/wp-json/wp/v2/pages?slug=${slug}`;
  useEffect(() => {
    async function fetchData() {
      const data = await dataService(url);
      setPageData(data[0]);
    }
    fetchData();
  }, [slug]);
  console.log(pageData);
  return (
    <section>
      <div dangerouslySetInnerHTML={createMarkup(pageData.content.rendered)} />
    </section>
  );
};

export default RegularPage;
