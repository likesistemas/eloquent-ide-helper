CREATE TABLE `products` (
  `id` int(6) NOT NULL,
  `subcategory_id` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `reference` int(10) NULL DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `subcategories` (
  `id` int(6) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

ALTER TABLE `subcategories`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
COMMIT;