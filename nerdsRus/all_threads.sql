create table all_threads_index (
p_id int not null auto_increment,
primary key(p_id),
thread_table_name text not null,
thread_disc_loc text not null,
author text not null,
orig_date text not null,
last_post_date text not null,
title text not null
);