-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 28, 2024 lúc 06:52 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `assignment`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `CID` int(15) NOT NULL,
  `Course_name` varchar(50) NOT NULL,
  `Description` varchar(400) NOT NULL,
  `Num_ques` int(15) NOT NULL,
  `TID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`CID`, `Course_name`, `Description`, `Num_ques`, `TID`) VALUES
(1, 'PHP', 'Khóa học giúp ôn tập và củng cố lại kiến thức liên quan đến ngôn ngữ PHP', 10, 1),
(2, 'Công nghệ phần mềm', 'Khóa học giúp ôn tập và củng cố lại kiến thức liên quan đến môn Công nghệ phần mềm', 6, 1),
(3, 'Lập trình web', 'Khóa học giúp ôn tập và củng cố lại kiến thức liên quan đến lập trình web cho sinh viên', 15, 3),
(4, 'Nguyên lý ngôn ngữ lập trình', 'Khóa học giúp ôn tập và củng cố lại kiến thức liên quan đến môn Nguyên lý ngôn ngữ lập trình', 8, 4),
(5, 'Mạng máy tính', 'Khóa học giúp ôn tập và củng cố lại kiến thức liên quan đến mạng máy tính', 10, 5),
(6, 'Quản lý dự án phần mềm', 'Khóa học giúp ôn tập và củng cố lại kiến thức liên quan đến việc quản lý dự án công nghệ phần mềm', 5, 6),
(7, 'Lập trình nâng cao', 'Khóa học giúp ôn tập và củng cố lại kiến thức liên quan đến vấn đề lập trình hướng đối tượng và lập trình hàm', 6, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question`
--

CREATE TABLE `question` (
  `QID` int(15) NOT NULL,
  `Topic` varchar(50) NOT NULL,
  `Content` varchar(500) NOT NULL,
  `Img_link` varchar(500) NOT NULL,
  `Level` varchar(10) NOT NULL,
  `A` varchar(500) NOT NULL,
  `B` varchar(500) NOT NULL,
  `C` varchar(500) NOT NULL,
  `D` varchar(500) NOT NULL,
  `Correct_ans` varchar(1) NOT NULL,
  `CID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `question`
--

INSERT INTO `question` (`QID`, `Topic`, `Content`, `Img_link`, `Level`, `A`, `B`, `C`, `D`, `Correct_ans`, `CID`) VALUES
(1, 'Giới thiệu', 'PHP là viết tắt của cụm từ nào? (áp dụng từ PHP 3.0 cho đến nay)', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/2560px-PHP-logo.svg.png', 'Dễ', 'Personality Home Page', 'Hypertext PreProcessor', 'Page Home Personality', 'PreProcessor Hypertext', 'B', 1),
(2, 'Giới thiệu', 'Phần mở rộng của tệp tin PHP là gì?', '', 'Dễ', '.php', '.html', '.js', '.xml', 'A', 1),
(3, 'Cú pháp', 'Con vật nào được xem là linh vật của ngôn ngữ PHP?', '', 'Dễ', 'Voi', 'Cáo', 'Gà trống', 'Rắn', 'A', 1),
(4, 'Cú pháp', 'Trong quy ước viết code PHP, để kết thúc dòng lệnh, ta sử dụng ký hiệu nào?', '', 'Dễ', '.', ';', ':', '}', 'B', 1),
(5, 'Cú pháp', 'Cách chú thích trong PHP khác với cách chú thích của ngôn ngữ nào sau đây?', '', 'Dễ', 'Python', 'C', 'C++', 'JavaScript', 'A', 1),
(6, 'Cú pháp', 'Dòng kết quả đầu tiên sau khi chạy đoạn mã bên dưới là gì:', 'https://devpro.edu.vn/public/uploads/images/blog/cu-phap-bien-du-lieu-trong-php-10.jpg', 'Dễ', 'Xin chào!', 'Xin Chào!', 'Xin Chào', 'Xin chào', 'C', 1),
(7, 'Cú pháp', 'Đâu là biến trong đoạn code bên dưới?', 'https://devpro.edu.vn/public/uploads/images/blog/cu-phap-bien-du-lieu-trong-php-10.jpg', 'Dễ', 'echo', 'php', 'br', 'name', 'D', 1),
(8, 'Câu lệnh', 'Cú pháp nào sau đây dùng để tạo một hàm có tên myFunction?', '', 'Vừa', 'func myFunc() {}', 'function myFunc()', 'func myFunction()', 'function myFunction()', 'D', 1),
(9, 'Câu lệnh', 'Cho đoạn mã sau:\r\n$a = 12; $b = 10;\r\nif ($a == $b) {echo \"Yes\";} \r\nelse {echo \"No\";}\r\nPhát biểu nào sau đây là đúng', 'https://static.javatpoint.com/phppages/images/if1.png', 'Vừa', 'Output của đoạn code là: Yes', 'Output của đoạn code là: No', 'Đoạn code trên có lỗi', 'Output là rỗng', 'A', 1),
(10, 'Câu lệnh', 'Trong PHP không có vòng lặp nào sau đây?', '', 'Khó', 'do while', 'for', 'foreach', 'repeat until', 'D', 1),
(11, 'Mô hình phát triển phần mềm', 'Hình ảnh này đang mô tả mô hình phát triển phần mềm nào?', 'https://images.viblo.asia/26474432-60fc-4a26-b34a-8d1d8d8d0a3b.png', 'Dễ', 'Mô hình Incremental', 'Mô hình Agile', 'Mô hình Waterfall', 'Mô hình Spiral', 'C', 2),
(12, 'Mô hình phát triển phần mềm', 'Mô hình Agile chủ yếu dựa trên hai mô hình nào?', '', 'Vừa', 'Iterative và Incremental', 'Iterative và Waterfall', 'Spiral và Incremental', 'Spiral và Waterfall', 'A', 2),
(13, 'Mô hình phát triển phần mềm', 'Đâu không phải là ưu điểm của mô hình Spiral?', '', 'Khó', 'Ứng dụng tốt với các dự án lớn và quan trọng', 'Luôn có thời gian cho khách hàng phản hồi về sản phẩm', 'Chức năng bổ sung và thay đổi có thể được thêm vào những giai đoạn sau', 'Tài liệu cho dự án thường rất ngắn gọn vì có ít các giai đoạn trung gian', 'D', 2),
(14, 'Sơ đồ', 'Tên gọi bằng tiếng Anh của sơ đồ dưới đây là gì?', 'https://creately.com/static/assets/guides/sequence-diagram-tutorial/image15.webp', 'Dễ', 'Use-case diagram', 'Sequence diagram', 'Class diagram', 'Activity diagram', 'B', 2),
(15, 'Sơ đồ', 'Tên của mỗi use-case trong Use-case diagram phải được đặt bằng?', '', 'Vừa', 'Danh từ', 'Danh từ hoặc cụm danh từ', 'Động từ hoặc danh từ', 'Động từ hoặc cụm động từ', 'D', 2),
(16, 'Sơ đồ', 'Trong class diagram, kí hiệu bên dưới đây có ý nghĩa gì?', 'https://cdn.codegym.vn/wp-content/uploads/2022/02/cach-doc-uml-class-diagram-7-1.png', 'Khó', 'sự liên hợp (association)', 'sự phụ thuộc (dependency)', 'sự tổ hợp (composition)', 'sự tụ tập (aggregation)', 'C', 2),
(17, 'HTML', 'Thẻ HTML nào thường dùng cho cho định dạng tiêu đề lớn nhất?', '', 'Dễ', 'head', 'h1', 'h6', 'heading', 'B', 3),
(18, 'HTML', 'Đâu là tên phần tử HTML dùng để định nghĩa dữ liệu sẽ hiển thị trên thanh tiêu đề của tài liệu?', '', 'Dễ', 'html', 'head', 'title', 'meta', 'C', 3),
(19, 'HTML', 'Đâu là tên phần tử HTML dùng để thực hiện việc xuống dòng mới?', '', 'Dễ', 'tab', 'br', 'break', 'lb', 'B', 3),
(20, 'CSS', 'Thứ tự nào sau đây là đúng khi xếp tầng của CSS theo độ ưu tiên từ thấp đến?', '', 'Dễ', 'external style sheet, internal style sheet, browser default, inline style', 'inline style, browser default, external style sheet, internal style sheet', 'browser default, internal style sheet, inline style, external style sheet', 'browser default, external style sheet, internal style sheet, inline style', 'D', 3),
(21, 'CSS', 'Thuộc tính CSS nào sau đây được dùng để tạo hiệu ứng chữ in đậm (bold)?', '', 'Dễ', 'font-variant', 'font-family', 'font-weight', 'font-style', 'C', 3),
(22, 'CSS', 'Trong CSS3, phần tử img có giá trị thuộc tính display mặc định là?', '', 'Vừa', 'block', 'flex', 'inline', 'inline-block', 'D', 3),
(23, 'CSS', 'Giả sử chúng ta muốn thiết kế các phần tử block xếp chồng lên nhau thành nhiều lớp, thuộc tính CSS nào sau đây sẽ được sử dụng để quy định thứ tự các lớp?', '', 'Vừa', 'x-index', 's-index', 'd-index', 'z-index', 'D', 3),
(24, 'PHP', 'Con vật nào được xem là linh vật của ngôn ngữ PHP?', '', 'Dễ', 'Voi', 'Cáo', 'Gà trống', 'Rắn', 'A', 3),
(25, 'PHP', 'Đâu là tên biến trong đoạn code sau?', 'https://devpro.edu.vn/public/uploads/images/blog/cu-phap-bien-du-lieu-trong-php-10.jpg', 'Dễ', 'br', 'name', 'echo', 'php', 'B', 3),
(26, 'PHP', 'Trong PHP không có vòng lặp nào sau đây?', '', 'Vừa', 'do while', 'for', 'foreach', 'repeat until', 'D', 3),
(27, 'PHP', 'Đoạn mã PHP này sẽ cho ra kết quả là gì khi thực thi?\r\n$x = 1;\r\n$y = 2;\r\necho ($x !== $y);', '', 'Vừa', 'Đoạn mã bị lỗi', 'False', '1', '0', 'C', 3),
(28, 'PHP', 'Đoạn mã PHP dưới đây sẽ cho kết quả gì khi thực thi?\r\n$s=\"chess was played\";\r\necho strlen(substr($s,3,2))', '', 'Vừa', '1', '2', '3', '0', 'B', 3),
(29, 'PHP', 'Trong chương trình PHP sử dụng thư viện mysqli, phát biểu nào sau đây có thể được dùng để chọn cơ sở dữ liệu có tên là dbname', '', 'Khó', 'mysqli=select_db(\'dbname\');', 'mysqli->select_db(\'dbname\');', '$mysqli=select_db(\'dbname\');', '$mysqli->select_db(\'dbname\');', 'D', 3),
(30, 'jQuery', 'Phát biểu jQuery nào dưới đây xoá tất cả các phần tử con của phần tử có id là result?', '', 'Vừa', '$(\".notif\").empty();', '$(\"#notif\").empty();', '$(\".notif\").remove();', '$(\"#notif\").remove();', 'B', 3),
(31, 'jQuery', 'Sử dụng thư viện jQuery trong javascript, phát biểu: $(\"div#myDiv > .para\") sẽ trả về các phần tử nào sau đây?', '', 'Khó', 'Các phần tử có thuộc tính class=\"para\" là con của các phần tử có tên thẻ là div và có thuộc tính id=\"myDiv\"', 'Các phần tử có thuộc tính class=\"para\" hoặc có thuộc tính id=\"myDiv\"', 'Các phần tử có thuộc tính id=\"myDiv\" nằm bên trong các phần tử có tên thẻ là div và có thuộc tính class=\"para\"', 'Các phần tử có thuộc tính class=\"para\" và có thuộc tính id=\"myDiv\"', 'A', 3),
(32, 'Lexer - Parser', 'Một danh hiệu trong ngôn ngữ lập trình Ruby là một chuỗi các kí tự¸ số, chữ thường và dấu gạch dưới. Nó phải được bắt đầu bằng một dấu gạch dưới hoặc một kí tự chữ thường. Chọn biểu thức chính quy phù hợp với mô tả danh hiệu nói trên?', '', 'Dễ', '[a-z0-9_]+', '[a-z_A-Z0-9]+', '[a-z_] [a-z0-9_]*', '[0-9_] [a-z0-9_]+', 'C', 4),
(33, 'Lexer - Parser', 'Cho biểu thức chính quy a[^abc]*c và các chuỗi nhập gồm: adc, abbc, ayyyyyyyyyc, abc, aabc, axc. Số chuỗi thỏa mãn biểu thức chính quy là bao nhiêu?', '', 'Dễ', '1', '2', '3', '4', 'C', 4),
(34, 'Lexer - Parser', 'Một văn phạm phi ngữ cảnh (context-free grammar) có thể bao gồm?', '', 'Dễ', 'Các biểu thức chính quy để mô tả kí hiệu không kết thúc', 'Tập các kí hiệu kết thúc, tập luật sinh', 'Một kí hiệu bắt đầu và biểu tức chính quy mô tả nó', 'Cả 3 đáp án đều sai', 'B', 4),
(35, 'Lexer - Parser', 'Cho đọan mã sau trong ANTLR\r\ndecl: ID decl_tail;\r\ndecl_tail: CM decl | CL ID CM;\r\nVế phải nào sau đây phù hợp cho luật sinh decl với đoạn mã trên?', '', 'Vừa', '(ID CM)* (CL ID CM)?', '(ID CM)* CL ID CM', 'ID CM ID (CL ID)* CM', 'ID (CM ID)* CL ID CM', 'D', 4),
(36, 'Lexer - Parser', 'Chọn biểu thức chính qui tương đương với biểu thức chính qui sau: (a|b)*(abb|b)a', '', 'Vừa', '(b*a*)*(ab)?ba', '[a|b]*[abb|b]a', '[ab]*[ab]?ba', '[ab]*(ab)+ba', 'A', 4),
(37, 'Lexer - Parser', 'Cho đoạn mã Python sau, hãy cho biết số token được phân tích từ vựng trả về khi phân tích cho chuỗi trên:\r\nresult = (lst[0] * 2) + func(x, y) - (lst[-1] if lst[1] >= -1.2 else lst[2]) % 5 # cal result', '', 'Vừa', '38', '43', '40', '45', 'C', 4),
(38, 'Lexer - Parser', 'Cho đoạn mã Python sau, hãy cho biết chuỗi lexeme của token thứ 25 là gì?\r\nresult = (lst[0] * 2) + func(x, y) - (lst[-1] if lst[1] >= -1.2 else lst[2]) % 5 # cal result', '', 'Vừa', '-1', ']', 'if', 'lst', 'C', 4),
(39, 'Lexer - Parser', 'Cho văn phạm phi ngữ cảnh G với tập ký hiệu kết thúc là {ADD,MINUS,MUL,DIV,LB,RB}, tập ký hiệu không kết thúc là {exp,term,fact}, ký hiệu bắt đầu là exp, và tập luật sinh là:\r\nexp → term MINUS exp | term\r\nterm → term ADD fact | term MUL fact | fact\r\nfact → factor DIV fact | factor\r\nfactor → LB exp RB | INT\r\nTừ đó, hãy tính toán giá trị của chuỗi nhập sau:\r\n123 - 4 + 32 / 16 / 2 * 3 - 10 ?', '', 'Khó', '110', '108', '111', '109', 'D', 4),
(40, '', 'Phương pháp nào dùng để ngăn chặn các thâm nhập trái phép từ mạng và có thể lọc bỏ các gói tin?', '', 'Dễ', 'Encryption', 'Bảo vệ hạ tầng vật lý', 'Login/ password', 'Firewall', 'D', 5),
(41, '', 'Hãy cho biết đâu là thứ tự các tầng theo thứ tự từ trên xuống dưới (top-down) trong mô hình Internet:', '', 'Dễ', 'Message, Segment, Datagram, Fragment, Physical', 'Application, Transport, Network, Data Link, Physical', 'Physical, Link, Network, Transport, Application', 'Physical, Fragment, Datagram, Segment, Message', 'B', 5),
(42, '', 'Một TCP server cần bao nhiêu socket để có thể hỗ trợ đồng thời N kết nối từ N client khác nhau?', '', 'Dễ', '1', 'n', 'n+1', 'không xác định', 'C', 5),
(43, '', 'Giao thức TCP có thể kế hợp với giao thức SSL để cung cấp dịch vụ bảo mật thông tin từ tiến trình đến\r\ntiến trình (process to process) bằng cách mã hóa thông tin. Bạn hãy cho biết SSL được hiện thực tại tầng nào trong\r\ncác tầng sau?', '', 'Dễ', 'Tầng mạng', 'Tầng ứng dụng', 'Tầng vận chuyển', 'Tầng data link', 'B', 5),
(44, '', 'Giả sử host A gửi 2 TCP segment kế tiếp nhau cho host B. Segment thứ nhất có SEQ là 120, segment thứ 2 có SEQ là 140. Hãy cho biết có bao nhiêu byte dữ liệu trong segment thứ nhất?', '', 'Vừa', '120 byte', '140 byte', '20 byte', 'không xác định', 'C', 5),
(45, '', 'Giả sử ta có một gói tin truyền từ host A đến host B thông qua bộ chuyển mạch (switch). Tốc độ truyền dữ\r\nliệu từ A đến switch là R1 và từ switch đến B là R2. Tổng thời gian để chuyển hết gói tin có chiều dài là L từ A đến B là bao nhiêu ? (bỏ qua tất các thời gian trễ tại switch và thời gian lan truyền tín hiệu trong dây dẫn)', '', 'Vừa', 'L/R1 + L/R2', 'L /(R1+R2)', '(R1 + R2) /L', 'R1/L + R2/L', 'A', 5),
(46, '', 'Giả sử host A gửi 2 segment kế tiếp nhau cho host B theo qua kết nối TCP. Segment thứ nhất có SEQ là 100, segment thứ 2 có SEQ là 110. Gói tin thứ nhất không đến được B, nhưng gói tin thứ 2 đến được B. Hãy cho biết giá trị ACK được host B trả về cho host A khi nhận được gói tin thứ 2 là bao nhiêu?', '', 'Vừa', '100', '101', '111', '110', 'A', 5),
(47, '', 'Kích thước của một datagram bao gồm header được gửi từ host A đến host B là 1500 byte. Hãy cho biết có bao nhiêu datagram được tạo ra khi ta gửi một file có kích thước 5000000 byte, biết rằng IP header có kích thước 20 byte?', '', 'Vừa', '3425', '3334', '3379', '3340', 'A', 5),
(48, '', 'Trong kỹ thuật mã hóa đối xứng?', '', 'Vừa', 'Nếu khóa Ka được sử dụng để mã hóa thì phải có một khóa Kb ( Khóa Kb khác Ka) để giải mã', 'Nếu khóa Kb được sử dụng để mã hóa thì phải có một khóa Ka ( Khóa Ka khác Kb) để giải mã', 'Nếu khóa Ka được sử dụng để mã hóa thì cũng chính khóa Ka được sử dụng để giải mã', 'Mã hóa đối xứng không sử dụng key để mã hóa và giải mã', 'C', 5),
(49, '', 'Lệnh nào trong các lệnh sau được sử dụng để thiết lập hostname cho Router trong Packet Tracer?', '', 'Vừa', 'Router(config)#name R1', 'Router(config)#hostname R1', 'Router#hostname R1', 'Router#name R1', 'B', 5),
(50, 'Mô hình phát triển phần mềm', 'Hình ảnh này đang mô tả mô hình phát triển phần mềm nào?', 'https://images.viblo.asia/26474432-60fc-4a26-b34a-8d1d8d8d0a3b.png', 'Dễ', 'Mô hình Incremental', 'Mô hình Agile', 'Mô hình Waterfall', 'Mô hình Spiral', 'C', 6),
(51, 'Mô hình phát triển phần mềm', 'Mô hình Agile chủ yếu dựa trên hai mô hình nào?', '', 'Vừa', 'Iterative và Incremental', 'Iterative và Waterfall', 'Spiral và Incremental', 'Spiral và Waterfall', 'A', 6),
(52, 'COCOMO', 'COCOMO là viết tắt của?', '', 'Dễ', 'Constructive Cost Model', 'Construction Cost Model', 'Cost Constructive Model', 'Cost Construction Model', 'A', 6),
(53, 'COCOMO', 'COCOMO gồm có mấy dạng?', '', 'Dễ', '2', '3', '4', '5', 'B', 6),
(54, 'COCOMO', 'Đâu không là tên một phương thức phát triển dự án phần mềm khi áp dụng COCOMO?', '', 'Dễ', 'Organic', 'Semi-detached', 'Embedded', 'Agile', 'D', 6),
(55, 'OOP', 'Lập trình hướng đối tượng (OOP) tập trung vào khái niệm nào sau đây?', '', 'Dễ', 'Module và gói', 'Hàm và biến', 'Đối tượng và lớp', 'Thủ tục và đối số', 'C', 7),
(56, 'OOP', 'Trong OOP, \"đa hình\" (polymorphism) là gì?', '', 'Dễ', 'Khả năng một lớp kế thừa từ nhiều lớp cha', 'Khả năng một hàm hoạt động khác nhau dựa trên loại dữ liệu đầu vào', 'Sự kế thừa từ một lớp cha duy nhất', 'Sự phụ thuộc giữa các đối tượng', 'B', 7),
(57, 'OOP', 'OOP là viết tắt của?', '', 'Dễ', 'Overloading Object Protocol', 'Object-Oriented Programming', 'Operations and Objects Programming', 'Object-Oriented Protocol', 'B', 7),
(58, 'FP', 'Trong lập trình hàm, \"hàm cao cấp\" (higher-order function) là gì?', '', 'Dễ', 'Hàm mà chỉ chấp nhận đối số là số nguyên', 'Hàm mà trả về giá trị là một hàm khác hoặc nhận một hàm khác làm đối số', 'Hàm mà không trả về giá trị', 'Hàm mà chỉ có thể được gọi một lần', 'B', 7),
(59, 'FP', 'Trong lập trình hàm, \"immutable data\" (dữ liệu bất biến) đề cập đến điều gì?', '', 'Dễ', 'Dữ liệu có thể thay đổi nhưng không được truy cập từ bên ngoài', 'Dữ liệu chỉ có thể thay đổi trong một phạm vi cụ thể', 'Dữ liệu có thể thay đổi bất kỳ lúc nào', 'Dữ liệu không thể thay đổi sau khi đã được khởi tạo', 'D', 7),
(60, 'FP', 'Trong lập trình hàm, \"hàm thuần túy\" (pure function) có đặc điểm gì?', '', 'Dễ', 'Luôn trả về giá trị là 0', 'Chỉ chấp nhận đầu vào là số nguyên', 'Luôn thay đổi trạng thái của biến ngoài', 'Không gây ra các hiệu ứng phụ và luôn trả về cùng một kết quả khi được gọi với cùng một đầu vào', 'D', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher`
--

CREATE TABLE `teacher` (
  `TID` int(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `First_name` varchar(50) NOT NULL,
  `Last_name` varchar(50) NOT NULL,
  `School` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `teacher`
--

INSERT INTO `teacher` (`TID`, `Email`, `Password`, `First_name`, `Last_name`, `School`) VALUES
(1, 'an.phanquoc2003@hcmut.edu.vn', '$2y$10$RyYeAK3xdiye6lynXsR2E.ci.dyT6ziQhKB/d5o0fAhKDIHKn1peu', 'An', 'Phan Quốc', 'Trường Đại học Bách khoa - Đại học Quốc gia TP.HCM'),
(2, 'quocthanh.280603@gmail.com', '$2y$10$Qcbfmk6PD1L51FNiIMGf..EFCSVtyj.m09dyMn0I8RjTSQdxQWunm', 'Thạnh', 'Phạm Huỳnh Quốc', 'Trường Đại học Khoa học Tự nhiên - Đại học Quốc gia TP.HCM'),
(3, 'thai@hcmut.edu.vn', '$2y$10$CIZWoWzQcgevRPH4uGpJruojnyE4RkGMYiz/TUjXbw0wJK6fMTn5W', 'Thái', 'Nguyễn Đức', 'Trường Đại học Bách khoa - Đại học Quốc gia TP.HCM'),
(4, 'phung@hcmut.edu.vn', '$2y$10$M8Jm1cxy3X1SYWdTatJY7ukkwsHZuq94Wb6CpskRvpaJJNYstg3yG', 'Phùng', 'Nguyễn Hứa', 'Trường Đại học Bách khoa - Đại học Quốc gia TP.HCM'),
(5, 'vu@hcmut.edu.vn', '$2y$10$7YtaWq/l5T7gYZH926y6QOYZ.i0XBbJc8WZlkqvKuNE.1SrJJgwM.', 'Vũ', 'Phạm Trần', 'Trường Đại học Bách khoa - Đại học Quốc gia TP.HCM'),
(6, 'tri@hcmut.edu.vn', '$2y$10$5Kci2iLVwZnmoJJWARGsO.5uhESSbISzi91puPtS07/BAD146lCNK', 'Trí', 'Nguyễn Cao', 'Trường Đại học Bách khoa - Đại học Quốc gia TP.HCM'),
(7, 'anh@hcmut.edu.vn', '$2y$10$GJdYv1a5U2dwfghNKpXbe.j6CMPxyFh4OCmACUs3/tu98yU8mH3EC', 'Anh', 'Trương Tuấn', 'Trường Đại học Bách khoa - Đại học Quốc gia TP.HCM'),
(8, 'phat.nguyen1002@hcmut.edu.vn', '$2y$10$0Anmjyv.JHOhHvYHwapTjuO/MKaBhGgW35LXCVdiDXTTLVXE8NlxW', 'Phát', 'Nguyễn Phúc Bảo', 'Trường Đại học Khoa học Tự nhiên - Đại học Quốc gia TP.HCM');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CID`);

--
-- Chỉ mục cho bảng `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`QID`);

--
-- Chỉ mục cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`TID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `CID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `question`
--
ALTER TABLE `question`
  MODIFY `QID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `teacher`
--
ALTER TABLE `teacher`
  MODIFY `TID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
