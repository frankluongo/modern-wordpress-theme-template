import React from "react";
import { Link } from "react-router-dom";

const NavItem = ({ item }) => {
  if (item.title === "Homepage") {
    return (
      <li>
        <Link to={`/`}>Home</Link>
      </li>
    );
  }
  return (
    <li>
      <Link to={`/${item.slug}`}>{item.title}</Link>
    </li>
  );
};

export default NavItem;
