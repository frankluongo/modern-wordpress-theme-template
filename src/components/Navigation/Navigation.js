import React from "react";
import NavItem from "./NavItem";
import { useNavState } from "../../state/NavWrapper";

const Navigation = () => {
  const { items } = useNavState();

  function renderItems() {
    if (items) {
      return items.map((item, index) => (
        <NavItem item={item} key={item.ID || index} />
      ));
    }
    return null;
  }

  return (
    <nav>
      <ul>{renderItems()}</ul>
    </nav>
  );
};

export default Navigation;
