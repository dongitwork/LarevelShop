CREATE TABLE `tax` (
  `TaxId` int(10) UNSIGNED NOT NULL,
  `TaxName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Percent` tinyint(4) NOT NULL,
  `Description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`TaxId`, `TaxName`, `Percent`, `Description`) VALUES
(1, 'TTĐB', 15, 'Thuế tiêu thụ đặc biệt'),
(2, 'XNK', 10, 'Thuế Xuất nhập khẩu'),
(3, 'NOTAX', 0, 'Thuế để test sản phẩm'),
(4, 'VAT', 10, 'Thuế giá trị gia tăng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`TaxId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `TaxId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
