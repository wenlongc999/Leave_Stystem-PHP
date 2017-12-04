## 请假管理系统   

## 受朋友之托，写了一个请假管理系统，使用PHP作为开发语言，使用ThinkPHP作为开发框架，使用了大量的ajax进行数据的传输验证，当然还有很多细节，有时间会一一讲解，下面是整个系统的截图，功能都已经实现，包括首页近期请假情况的显示，请假条的申请，学生信息的自动填写，自动生成假条模板可以直接打印，可以预览，假条有两种，短期和长期假条，在申请的时候可以选择，还有请假条的注销，学生信息的显示，班级每天每周每月的请假情况，年级的总体请假情况，级别，班级和学生的信息添加，并且支持使用Excel文件来大批量添加学生信息，还有学生信息的删除功能，可以一次性选择删除班级，年级等，在系统设置中，还可以修改管理员的权限，密码，用户名什么的，还可以查看系统使用的日志等等功能。

### 开发日志：   

##### 更新说明：修复了在服务器上无法上传文件，因为没有给权限，修改了在添加完假条后点击打印，显示的是空白页面的问题，因为在添加完以后，data数组中并无id字段，所以没有查找到这个假条

##### 更新说明：完善了长期假条和短期假条的显示方式，使整个页面更加整洁，添加了数据的显示功能，优化两种假条上数据的显示格式，使打印的时候比较好看，在function函数中增加了数字格式日期转换为中文日期的功能，修改了UI界面，在有下拉列表的菜单栏里，下拉列表能够保持下去，不再需要每次都点击开下拉列表，使得用户交互比较友好

##### 更新说明：添加了短期假条的申请页面，修改了模板显示功能，可以选择显示长期假条或者短期假条，在假条列表中，新增了类型字段显示，还有查看功能，可以打开假条模板中查看，

##### 更新说明：修改了student和class的Controller中重复出现级别列表添加的代码，放置到前置初始化操作调用中

##### 更新说明：1.更新了管理员的信息修改功能，可以修改登录用户名，用户角色，用户密码，刚刚发现修改了好多遍的值都还改不了，断点调试了几次，发现没有问题，sql语句也没有问题，后来才发现，是session的问题，要修改的话连session也需要修改掉。2. 更新了在假条申请时，如果输入不存在的学号，ajax调用失败，不会提示学号输入有误的bug，原因是，在str = res的时候，因为传回来的数组为空，导致这句话错误，js不再继续执行后面的语句，现在把这一行去掉，直接使用res来作为判断条件

##### 更新说明：完善了界面，去除了不必要的数字显示，将菜单栏动态切换显示的加重效果写了出来，更加方便使用

##### 8-16更新说明：1，删除了功能菜单中的学期信息，因为我也不知道这个菜单里要放什么内容，2.在添加信息里新增了批量导入功能，可以导入指定格式的Excel表格，这个功能调试了很久，因为PHPExcel包的位置一直没有放对，我还写了导入数据时的动态更新进度功能，可以看哪些信息出错导入失败，导入功能还是很好玩的。3.新增了删除信息菜单，删除信息菜单包括删除学生，删除班级，删除级别，每一级的删除并不简单，删除相应的级别，对应级别里的所有班级和学生都会被删除，所以我还是验证了很多遍的，功能基本实现，能够完全删除，班级的删除也是将所有学生删除掉。4.取消了所有的搜索框和分页栏，因为觉得没什么用，全部遍历出来就好了，做分页还需要每一个都设置一遍

##### 更新说明：整个项目经过三天的设计和完善，总算差不多了，基本的功能都通了，可以使用，假条的申请注销都没有问题，包括ajax的调用都很好用，学生信息里的下拉列表是个问题，解决了这个问题也让我想通了聊天室应该怎么用ajax，很巧妙，也就是多级的下拉列表的互动传值问题，其他的信息添加和显示都是同理，没有什么区别。第二个难点就是信息的统计，因为统计的方式比较多，涉及到每天的，昨天的，本周，上周，本月，上月，本班级，本级别等各种形式的数据统计，问题就出在了如何获取本周内所有的日期，本月内所有日期获取，解决了这个问题，信息的统计就很好办了。总体开发以及完成，手写代码可能几千，晚上已经全部打了注释，代码的样子很满意，这次模板选的很好，整体写开来也比较快，注释了几十行，方便以后的使用。就这样

##### 更新说明，新增了学生信息表，添加了学生列表页面，修改了小细节包括多下拉列表的显示，2.新增了请假申请的页面，完善了表单信息  

##### 开启了登录模式，完成了登录功能

##### 写好了请假条的模板，已经修改了首页的信息，菜单栏等设置，上传README.md文档

##### 项目基础，上传thinkphp框架

![](http://cos.rain1024.com/blog/netword/leave14.jpg)

![](http://cos.rain1024.com/blog/netword/leave1.jpg)

![](http://cos.rain1024.com/blog/netword/leave2.jpg)

![](http://cos.rain1024.com/blog/netword/leave3.jpg)

![](http://cos.rain1024.com/blog/netword/leave4.jpg)

![](http://cos.rain1024.com/blog/netword/leave5.jpg)

![](http://cos.rain1024.com/blog/netword/web51.jpg)

![](http://cos.rain1024.com/blog/netword/web52.jpg)

![](http://cos.rain1024.com/blog/netword/web50.jpg)

![](http://cos.rain1024.com/blog/netword/web49.jpg)

![](http://cos.rain1024.com/blog/netword/web48.jpg)

![](http://cos.rain1024.com/blog/netword/leave6.jpg)

![](http://cos.rain1024.com/blog/netword/leave7.jpg)

![](http://cos.rain1024.com/blog/netword/leave8.jpg)

![](http://cos.rain1024.com/blog/netword/leave9.jpg)

![](http://cos.rain1024.com/blog/netword/leave10.jpg)

![](http://cos.rain1024.com/blog/netword/leave11.jpg)

![](http://cos.rain1024.com/blog/netword/leave12.jpg)

![](http://cos.rain1024.com/blog/netword/leave13.jpg)